"use strict";

var dropzone = new Dropzone("#mydropzone", {
  url: "#",
  paramName: "tes_supporting_images[]",
  acceptedFiles: "image/png, image/jpg, image/jpeg",
  maxFilesize: 2,
  maxFiles: 3,
  addRemoveLinks: true,
  dictDefaultMessage: "Drag and drop files here or click to upload",
  init: function() {
    this.on("maxfilesexceeded", function(file) {
      this.removeFile(file);
      alert("You can only upload a maximum of 3 files.");
    });
    // Tambahkan event listener untuk form submit
    document.querySelector("form").addEventListener("submit", function (e) {
        e.preventDefault(); // Hentikan form submit biasa

        // Proses file di Dropzone
        dropzone.processQueue();
      });

      // Event ketika semua file selesai diupload
      this.on("queuecomplete", function () {
        // Submit form setelah semua file diupload
        document.querySelector("form").submit();
      });
  }
});

var minSteps = 6,
  maxSteps = 60,
  timeBetweenSteps = 100,
  bytesPerStep = 100000;

dropzone.uploadFiles = function(files) {
  var self = this;

  for (var i = 0; i < files.length; i++) {

    var file = files[i];
      totalSteps = Math.round(Math.min(maxSteps, Math.max(minSteps, file.size / bytesPerStep)));

    for (var step = 0; step < totalSteps; step++) {
      var duration = timeBetweenSteps * (step + 1);
      setTimeout(function(file, totalSteps, step) {
        return function() {
          file.upload = {
            progress: 100 * (step + 1) / totalSteps,
            total: file.size,
            bytesSent: (step + 1) * file.size / totalSteps
          };

          self.emit('uploadprogress', file, file.upload.progress, file.upload.bytesSent);
          if (file.upload.progress == 100) {
            file.status = Dropzone.SUCCESS;
            self.emit("success", file, 'success', null);
            self.emit("complete", file);
            self.processQueue();
          }
        };
      }(file, totalSteps, step), duration);
    }
  }
}
