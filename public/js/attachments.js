(function() {
  // https://trix-editor.org/js/attachments.js
  // http://headway.io/blog/how-to-use-trix-and-shrine-for-wysiwyg-editing-with-drag-and-drop-image-uploading/

  // Trix.config.attachments.preview.caption = {
  //   name: false,
  //   size: false
  // };

  var HOST = "https://" + location.hostname;
  // var HOST = "https://d13txem1unpe48.cloudfront.net/"

  addEventListener("trix-attachment-add", function(event) {
    if (event.attachment.file) {
      uploadAttachment(event.attachment);
    }
  });

  function uploadAttachment(attachment) {
    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    var file = attachment.file;
    var form = new FormData();
    form.append("Content-Type", file.type);
    form.append("file", file);
    // data.append("key", key)
    var endpoint = "/api/upload";
    // var key = createStorageKey(file)
    var xhr = new XMLHttpRequest();

    xhr.open("POST", endpoint, true);
    xhr.setRequestHeader("X-CSRF-Token", csrfToken);

    xhr.upload.addEventListener("progress", function(event) {
      var progress = event.loaded / event.total * 100;
      attachment.setUploadProgress(progress);
    });

    xhr.addEventListener("load", function(event) {
      if (xhr.status == 201) {
        var response = JSON.parse(this.responseText);
        attachment.setAttributes({ url: response.data.url });
        // attachment.setAttributes({ url: HOST + key })
      }
    });

    xhr.send(form);
  }

  // function createStorageKey(file) {
  //   var date = new Date()
  //   var day = date.toISOString().slice(0,10)
  //   var name = date.getTime() + "-" + file.name
  //   return [ "tmp", day, name ].join("/")
  // }

})();
