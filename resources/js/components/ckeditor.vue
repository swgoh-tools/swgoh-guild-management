<template>
    <div class="ckeditor">
        <textarea :id="id" :name="name" :value="value" :placeholder="placeholder"></textarea>
    </div>
</template>

<script>
// import Trix from "trix";

export default {
  props: {
    value: {
      type: String
    },
    name: {
      type: String
    },
    placeholder: {
      type: String
    },
    shouldClear: {
      type: Boolean,
      default: false
    },
    id: {
      type: String,
      default: "editor"
    },
    height: {
      type: String,
      default: "90px"
    },
    toolbar: {
      type: Array,
      default: () => [
        ["Undo", "Redo"],
        ["Bold", "Italic", "Strike"],
        ["NumberedList", "BulletedList"],
        ["Cut", "Copy", "Paste"]
      ]
    },
    language: {
      type: String,
      default: "en"
    },
    extraplugins: {
      type: String,
      default: "uploadimage"
    },
    uploadUrl: {
      type: String,
      default: "upload"
    }
  },

  watch: {
    'shouldClear': function () {
      CKEDITOR.instances[this.id].setData('');
    }
  },
    
  beforeUpdate() {
    if (this.value !== CKEDITOR.instances[this.id].getData()) {
      CKEDITOR.instances[this.id].setData(this.value);
    }
  },
  mounted() {
    const ckeditorConfig = {
    //   toolbar: this.toolbar,
    //   language: this.language,
    //   height: this.height,
      extraPlugins: this.extraplugins,
      uploadUrl: this.uploadUrl,
    };

    CKEDITOR.replace(this.id, ckeditorConfig);
    CKEDITOR.instances[this.id].setData(this.value);
    CKEDITOR.instances[this.id].on("change", () => {
      let ckeditorData = CKEDITOR.instances[this.id].getData();
      if (ckeditorData !== this.value) {
        this.$emit("input", ckeditorData);
      }
    });
    CKEDITOR.instances[this.id].on( 'fileUploadRequest', function( evt ) {
        var xhr = evt.data.fileLoader.xhr;
        xhr.setRequestHeader( 'X-CSRF-TOKEN', $('meta[name="csrf-token"]').attr('content') );
    } );

  },
  destroyed() {
    if (CKEDITOR.instances[this.id]) {
      CKEDITOR.instances[this.id].destroy();
    }
  }
};
</script>