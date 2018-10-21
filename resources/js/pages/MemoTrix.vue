<style scoped>
    .action-link {
        cursor: pointer;
    }
    .loader {
    position: relative;
    text-align: center;
    margin: 15px auto 35px auto;
    z-index: 9999;
    display: block;
    width: 80px;
    height: 80px;
    border: 10px solid rgba(0, 0, 0, .3);
    border-radius: 50%;
    border-top-color: #000;
    animation: spin 1s ease-in-out infinite;
    -webkit-animation: spin 1s ease-in-out infinite;
    }

    @keyframes spin {
    to {
        -webkit-transform: rotate(360deg);
    }
    }

    @-webkit-keyframes spin {
    to {
        -webkit-transform: rotate(360deg);
    }
    }


    /** MODAL STYLING **/

    .modal-content {
    border-radius: 0px;
    box-shadow: 0 0 20px 8px rgba(0, 0, 0, 0.7);
    }

    .modal-backdrop.show {
    opacity: 0.75;
    }

    .loader-txt {
    p {
        font-size: 13px;
        color: #666;
        small {
        font-size: 11.5px;
        color: #999;
        }
    }
    }

</style>

<template>
    <div>
        <div class="card mb-3">
            <div class="card-header">
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <span>
                        Memos
                    </span>
                    <div>
                    <a class="action-link" tabindex="-1" @click="getMemos">
                        Übersicht neu laden
                    </a>
                    <a class="action-link" tabindex="-1" @click="toggleTimer">
                        <span id="reload-label">(-)</span>
                    </a>
                    </div>

                    <a class="action-link" tabindex="-1" @click="showCreate">
                        Create New Memo
                    </a>
                </div>
            </div>

            <div class="card-body">
                <!-- Current Memos -->
                <p class="mb-0" v-if="memos.length === 0">
                    You have not created any memos.
                </p>

                <table class="table table-borderless mb-0" v-if="memos.length > 0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Titel</th>
                            <th>Auszug (Inhalt)</th>
                            <th>Erstellt / Geändert</th>
                            <th>Blockiert</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr v-for="memo in memos">
                            <!-- ID -->
                            <td style="vertical-align: middle;">
                                {{ memo.id }}
                            </td>

                            <!-- Name -->
                            <td style="vertical-align: middle;">
                                {{ memo.title }}
                            </td>

                            <!-- Secret -->
                            <td style="vertical-align: middle;">
                                <code>{{ memo.body | truncate(25) }}</code>
                            </td>

                            <!-- Secret -->
                            <td style="vertical-align: middle;">
                                <span v-if="hasCreator(memo)">{{ memo.created_at }} ({{ memo.creator.name }})</span>
                                <span v-if="hasEditor(memo)"><br />{{ memo.updated_at }} ({{ memo.editor.name }})</span>
                            </td>

                            <!-- Secret -->
                            <td style="vertical-align: middle;">
                                <span v-if="hasLock(memo)">{{ memo.lock.created_at }} ({{ memo.lock.user.name }})<br />{{ memo.lock.updated_at }}</span>
                            </td>

                            <!-- Edit Button -->
                            <td style="vertical-align: middle;">
                                <a class="btn btn-success" @click="showEdit(memo)" aria-label="Edit">
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                </a>
                                <!-- <a class="action-link" tabindex="-1" @click="showEdit(memo)">
                                    Edit
                                </a> -->
                            </td>

                            <!-- Position Button -->
                            <td style="vertical-align: middle;">
                                <a class="btn btn-secondary" @click="showPosition(memo)" aria-label="Position">
                                    <i class="fa fa-arrows-v" aria-hidden="true"></i>
                                </a>
                                <!-- <a class="action-link" @click="showPosition(memo)">
                                    Position
                                </a> -->
                            </td>

                            <!-- Delete Button -->
                            <td style="vertical-align: middle;">
                                <a class="btn btn-danger" @click="destroy(memo)" aria-label="Delete">
                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                </a>
                                <!-- <a class="action-link text-danger" @click="destroy(memo)">
                                    Delete
                                </a> -->
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Create Memo Modal -->
        <div class="modal fade" id="modal-create-memo" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">
                            Create Memo
                        </h4>

                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>

                    <div class="modal-body">
                        <!-- Form Errors -->
                        <div class="alert alert-danger" v-if="createForm.errors.length > 0">
                            <p class="mb-0"><strong>Whoops!</strong> Something went wrong!</p>
                            <br>
                            <ul>
                                <li v-for="error in createForm.errors">
                                    {{ error }}
                                </li>
                            </ul>
                        </div>


                        <div>
                            <div v-if="signedIn">
                                <!-- Create Memo Form -->
                                <form role="form">
                                    <!-- Name -->
                                    <div class="form-group">
                                        <!-- <label class="col-md-3 col-form-label">Title</label> -->

                                        <!-- <div class="col-md-12"> -->
                                            <input id="create-memo-title" type="text" class="form-control" name="title" v-model="createForm.title">

                                            <span class="form-text text-muted">Section title.</span>
                                        <!-- </div> -->
                                    </div>
                                    <div class="form-group">
                                        <input id="create-memo-body" type="hidden" name="body" value="" v-model="createForm.body">

                                        <trix-editor ref="trixc" input="create-memo-body" placeholder="Bitte Text eingeben."></trix-editor>
                                        <!-- <xwysiwyg name="updateForm.body" v-model="updateForm.body" placeholder="Have something to say?" :shouldClear="completed"></xwysiwyg> -->
                                    </div>

                                </form>
                            </div>
                            <p class="text-center" v-else>
                                Please <a href="/login">sign in</a> to participate in this
                                discussion.
                            </p>
                        </div>
                    </div>

                    <!-- Modal Actions -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                        <button type="button" class="btn btn-primary" @click="store">
                            Create
                        </button>
                        <!-- <button type="submit"
                                class="btn btn-secondary"
                                @click="addReply">Post</button> -->
                    </div>

                </div>
            </div>
        </div>

        <!-- Edit Memo Modal -->
        <div class="modal fade" id="modal-edit-memo" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">
                            Edit Memo
                        </h4>

                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>

                    <div class="modal-body">
                        <!-- Form Errors -->
                        <div class="alert alert-danger" v-if="editForm.errors.length > 0">
                            <p class="mb-0"><strong>Whoops!</strong> Something went wrong!</p>
                            <br>
                            <ul>
                                <li v-for="error in editForm.errors">
                                    {{ error }}
                                </li>
                            </ul>
                        </div>

                        <!-- Edit Memo Form -->
                        <form role="form">
                            <!-- Name -->
                            <div class="form-group xxxrow">
                                <!-- <label class="col-md-3 col-form-label">Title</label> -->

                                <!-- <div class="col-md-9"> -->
                                    <input id="edit-memo-title" type="text" class="form-control" v-model="editForm.title">

                                    <span class="form-text text-muted">
                                        Titel des Abschnitts.
                                    </span>
                                <!-- </div> -->
                            </div>

                            <!-- Redirect URL -->
                            <div class="form-group xxxrow">
                                <!-- <label class="col-md-3 col-form-label">Text</label> -->

                                <!-- <div class="col-md-9"> -->
                                    <input id="edit-memo-body" type="hidden" name="body" value="" v-model="editForm.body">

                                    <trix-editor ref="trixe" input="edit-memo-body" placeholder="Bitte Text eingeben."></trix-editor>

                                    <span class="form-text text-muted">
                                        Inhalt / Text des Abschnitts.
                                    </span>
                                <!-- </div> -->
                            </div>
                        </form>
                    </div>

                    <!-- Modal Actions -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                        <button type="button" class="btn btn-primary" @click="update">
                            Save Changes
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Position Memo Modal -->
        <div class="modal fade" id="modal-position-memo" tabindex="-1" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">
                            Change Position
                        </h4>

                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>

                    <div class="modal-body">
                        <!-- Form Errors -->
                        <div class="alert alert-danger" v-if="positionForm.errors.length > 0">
                            <p class="mb-0"><strong>Whoops!</strong> Something went wrong!</p>
                            <br>
                            <ul>
                                <li v-for="error in positionForm.errors">
                                    {{ error }}
                                </li>
                            </ul>
                        </div>

                        <!-- Position Memo Form -->
                        <form role="form">
                            <!-- Name -->
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label">Page</label>

                                <div class="col-md-9">
                                    <input id="position-memo-title" type="text" class="form-control"
                                                                @keyup.enter="update" v-model="positionForm.title">

                                    <span class="form-text text-muted">
                                        Seite, auf der der Abschnitt angezeigt wird.
                                    </span>
                                </div>
                            </div>

                            <!-- Redirect URL -->
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label">Vorgänger</label>

                                <div class="col-md-9">

                                    <span class="form-text text-muted">
                                        Abschnitt, hinter dem dieser Abschnitt angezeigt/eingeordnet werden soll.
                                    </span>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- Modal Actions -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                        <button type="button" class="btn btn-primary" @click="relocate">
                            Save Changes
                        </button>
                    </div>
                </div>
            </div>
        </div>

    
        <!-- Modal -->
        <div class="modal fade" id="loadMe" tabindex="-1" role="dialog" aria-labelledby="loadMeLabel">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
            <div class="modal-body text-center">
                <div class="loader"></div>
                <div class="loader-txt">
                <i class="fa fa-rebel fa-3x" aria-hidden="true"></i>
                <p>Patience you must have, my young Padawan.</p>
                <p><small>Time will tell when loading is finished... #yoda</small></p>
                <i class="fa fa-empire fa-3x" aria-hidden="true"></i>
                </div>
            </div>
            </div>
        </div>
        </div>

    <!-- end surrounding div -->
    </div>
</template>

<script>
    import Trix from 'trix';
    import 'jquery.caret';
    import 'at.js';
    export default {
        props: ['name', 'value', 'placeholder', 'shouldClear'],
        /*
         * The component's data.
         */
        data() {
            return {
                memos: [],

                createForm: {
                    errors: [],
                    title: '',
                    body: ''
                },

                editForm: {
                    errors: [],
                    id: '',
                    title: '',
                    body: ''
                },

                positionForm: {
                    errors: [],
                    id: '',
                    title: '',
                    page_id: '',
                    before_id: ''
                },

                // body: '',
                test: '',
                timer: {
                    value: '',
                    count: '',
                    enabled: true,
                    requestrunning: false,
                    interval: 60,
                    refresh: 1000,
                    limit: 20
                },
                completed: false
            };
        },

        /**
         * Prepare the component (Vue 1.x).
         */
        ready() {
            this.prepareComponent();
        },

        /**
         * Prepare the component (Vue 2.x).
         */
        mounted() {
            this.prepareComponent();

            $('#create-memo-body').atwho({
                at: "@",
                delay: 750,
                callbacks: {
                    remoteFilter: function(query, callback) {
                        $.getJSON("/api/users", {name: query}, function(usernames) {
                            callback(usernames)
                        });
                    }
                }
            });
            $('#edit-memo-body').atwho({
                at: "@",
                delay: 750,
                callbacks: {
                    remoteFilter: function(query, callback) {
                        $.getJSON("/api/users", {name: query}, function(usernames) {
                            callback(usernames)
                        });
                    }
                }
            });

            this.$refs.trixc.addEventListener('trix-change', e => {
                // $('#create-memo-body').value = e.target.innerHTML; // e.target.attributes.input
                this.$emit('input', e.target.innerHTML);
            });

            this.$watch('shouldClear', () => {
                this.$refs.trixc.value = '';
            });
            this.$refs.trixe.addEventListener('trix-change', e => {
                // $('#edit-memo-body').value = e.target.innerHTML; // e.target.attributes.input
                this.$emit('input', e.target.innerHTML);
            });

            this.$watch('shouldClear', () => {
                this.$refs.trixe.value = '';
            });
        },

        computed: {
        },

        methods: {
            hasCreator(memo) {
                // return !!this.$slots.default[0].text.length;
                return typeof memo.creator !== 'undefined' && memo.creator !== null;
            },
            hasEditor(memo) {
                return typeof memo.editor !== 'undefined' && memo.editor !== null;
            },
            hasLock(memo) {
                // return !!this.$slots.default[0].text.length;
                return typeof memo.lock !== 'undefined' && memo.lock !== null;
            },
            async checkTimer() {
                if (this.timer.count > this.timer.limit || ! this.timer.enabled) {
                    document.getElementById('reload-label').innerHTML = "(auto reload off)";
                    return;
                }
                var left = this.timer.value;
                if (left == 1) {
                    document.getElementById('reload-label').innerHTML = "...";
                    await this.getMemos(false);
                    this.timer.count = this.timer.count + 1;
                    this.resetTimer();
                } else {
                    var h = Math.floor(left / 60 / 60);
                    var m = Math.floor( (left % 60) / 60);
                    var s = (left % 120);
                    document.getElementById('reload-label').innerHTML = h + ":" + m + ":" + s;
                    var t = setTimeout(this.checkTimer, this.timer.refresh);
                    this.timer.value = this.timer.value - 1;
                }
            },
            toggleTimer () {
                this.timer.enabled = ! this.timer.enabled;
                if (this.timer.enabled) {
                    this.resetTimer(true);
                }
            },
            resetTimer (resetcounter = false) {
                if (resetcounter) {
                    this.timer.count = 0;
                }
                this.timer.value = this.timer.interval;
                this.checkTimer();
            },
            /**
             * Prepare the component.
             */
            prepareComponent() {
                Trix.config.attachments.preview.caption = {
                    name: false,
                    size: false
                };
                // this.test1 = this.$refs.trixe.editor.getDocument(); // Trix Document Object => tostring loses all html tags
                // this.test2 = this.$refs.trixe.value; // HTML Source Text

                this.getMemos();

                $('#modal-create-memo').on('shown.bs.modal', () => {
                    $('#create-memo-title').focus();
                });

                $('#modal-edit-memo').on('shown.bs.modal', () => {
                    $('#edit-memo-title').focus();
                });

                $('#modal-create-memo').on('hidden.bs.modal', () => {
                    this.createForm.errors = [];
                });
                $('#modal-edit-memo').on('hide.bs.modal', () => {
                    this.releaseLock(this.editForm.id);
                    this.editForm.errors = [];
                });
                $('#modal-position-memo').on('hidden.bs.modal', () => {
                    this.positionForm.errors = [];
                });

                // console.log(location.pathname); // w/o prot, w/o domain
                // console.log(location.origin); // prot + domain
                // console.log(location.href); // complete url
                this.resetTimer();

            },

            /**
             * Get all of the memos for the user.
             */
            async getMemos(spin = true) {
                if (this.timer.requestrunning) {
                    return;
                }
                this.timer.requestrunning = true;
                if (spin) {
                    $("#loadMe").modal({
                    backdrop: "static", //remove ability to close modal with click
                    keyboard: false, //remove option to close with keyboard
                    show: true //Display loader!
                    });
                }
                await axios.get(location.pathname + '/memos')
                        .then(response => {
                            this.memos = response.data;
                        });
                // if (spin) {
                    $("#loadMe").modal("hide");
                // }
                this.timer.value = this.timer.interval;
                this.timer.requestrunning = false;
            },

            /**
             * Get lock on memo for editing.
             */
            async getLock(id) {
                let lock = await axios.post('memos/' + id + '/lock', {}, {
                        headers: {
                            'Accept': 'application/json',
                            'Content-Type': 'application/json',
                        }
                    })
                    .then(response => {
                        // console.log('success');
                        // console.log(response);
                        flash('Sperre für Bearbeitung eingerichtet.', 'success');
                        return response.data;
                    })
                    .catch(error => {
                    if (error.response) {
                        console.log(error.response);
                        flash('Bearbeitungssperre für Textelement fehlgeschlagen.', 'danger');
                        return false;
                    } else if (error.request) {
                    // The request was made but no response was received
                    console.log(error.request);
                    } else {
                    // Something happened in setting up the request that triggered an Error
                    console.log('Error', error.message);
                    }
                    flash(error.message, 'danger');
                    return false;
                });
                this.test = lock;
                return lock;
            },

            /**
             * Get lock on memo for editing.
             */
            releaseLock(id) {
                axios.delete('memos/' + id + '/lock', {}, {
                        headers: {
                            'Accept': 'application/json',
                            'Content-Type': 'application/json',
                        }
                    })
                    .then(response => {
                        flash(response.data, 'success');
                        // return true;
                    })
                    .catch(error => {
                    if (error.response) {
                    flash(error.response, 'danger');
                    } else if (error.request) {
                    // The request was made but no response was received
                    console.log(error.request);
                    } else {
                    // Something happened in setting up the request that triggered an Error
                    console.log('Error', error.message);
                    }
                    flash(error.message, 'danger');
                });
            },

            /**
             * Show the form for creating new memos.
             */
            showCreate() {
                $('#modal-create-memo').modal({
                    backdrop: "static", //remove ability to close modal with click
                    keyboard: false, //remove option to close with keyboard
                    show: true //Display loader!
                    });
            },

            /**
             * Create a new memo for the user.
             */
            store() {
                let data = new FormData();

                data.append('title', this.createForm.title);
                data.append('body', this.$refs.trixc.value);
                this.persistMemo(
                    'post', 'memos',
                    data, '#modal-create-memo', this.createForm
                );
            },

            /**
             * Edit the given memo.
             */
            async showEdit(memo) {
                let lock = await this.getLock(memo.id);

                if (!lock || typeof lock.user === 'undefined' ) {
                    flash('Eintrag wird bereits bearbeitet.', 'danger');
                    return false;
                }
                this.editForm.id = memo.id;
                this.editForm.title = memo.title;
                this.editForm.body = memo.body;
                this.$refs.trixe.value = memo.body;

                $('#modal-edit-memo').modal({
                    backdrop: "static", //remove ability to close modal with click
                    keyboard: false, //remove option to close with keyboard
                    show: true //Display loader!
                    });
            },

            /**
             * Edit the given memo.
             */
            showPosition(memo) {
                this.positionForm.id = memo.id;
                this.positionForm.page_id = memo.page_id;
                this.positionForm.title = memo.title;

                $('#modal-position-memo').modal({
                    backdrop: "static", //remove ability to close modal with click
                    keyboard: false, //remove option to close with keyboard
                    show: true //Display loader!
                    });
            },

            /**
             * Update the memo being edited.
             */
            update() {
                let data = new FormData();

                data.append('title', this.editForm.title);
                data.append('body', this.$refs.trixe.value);
                this.persistMemo(
                    'put', 'memos/' + this.editForm.id,
                    data, '#modal-edit-memo', this.editForm
                );
            },

            /**
             * Update the memo being edited.
             */
            relocate() {
                let data = new FormData();

                data.append('page_id', this.positionForm.page_id);
                data.append('before_id', this.positionForm.before_id);
                this.persistMemo(
                    'put', 'memos/' + this.positionForm.id,
                    data, '#modal-position-memo', this.positionForm
                );
            },

            // addReply() {
            //     axios.post(location.pathname + '/replies', { body: this.body })
            //         .catch(error => {
            //             flash(error.response.data, 'danger');
            //         })
            //         .then(({data}) => {
            //             this.body = '';
            //             this.completed = true;

            //             flash('Your reply has been posted.');

            //             this.$emit('created', data);
            //         });
            // },

            /**
             * Persist the memo to storage using the given form.
             */
            persistMemo(method, uri, data, modal, form) {
                // fix PUT for Laravel using _method field
                // https://github.com/laravel/framework/issues/13457
                // alternatively: use 'Content-Type': 'application/x-www-form-urlencoded'
                if (method == 'put') {
                    data.append('_method', 'PUT');
                    method = 'post';
                }
                axios({
                    method: method,
                    url: uri,
                    data: data,
                        headers: {
                            'Accept': 'application/json',
                            // 'Content-Type': 'application/x-www-form-urlencoded',
                            'Content-Type': 'multipart/form-data',
                            // 'Content-Type': 'application/json',
                            }
                    }
                )
                .then(response => {
                    $(modal).modal('hide');
                    flash('Your memo has been posted.', 'success');
                    this.getMemos();
                    // console.log(response.data);
                    // console.log(response.status);
                    // console.log(response.statusText);
                    // console.log(response.headers);
                    // console.log(response.config);
                })
                .catch(error => {
                    if (error.response) {
                    form.errors = [];
                    // The request was made and the server responded with a status code
                    // that falls out of the range of 2xx
                    console.log(error.response.data);
                    console.log(error.response.status);
                    console.log(error.response.headers);
                    form.errors = [error.response];
                    flash(error.response, 'danger');
                    } else if (error.request) {
                    // The request was made but no response was received
                    // `error.request` is an instance of XMLHttpRequest in the browser and an instance of
                    // http.ClientRequest in node.js
                    console.log(error.request);
                    } else {
                    // Something happened in setting up the request that triggered an Error
                    console.log('Error', error.message);
                    }
                    console.log(error.config);
                    form.errors = [error.message];
                    flash(error.message, 'danger');
                });
            },

            // /**
            //  * Persist the memo to storage using the given form.
            //  */
            // persistMemoTRY(method, uri, form, modal) {
            //     alert(uri);
            //     form.errors = [];
            //     axios.post(location.pathname + '/memos', { body: this.createForm.body, title: this.createForm.title })
            //         .catch(error => {
            //             flash(error.response.data, 'danger');
            //         })
            //         .then(({data}) => {
            //             this.body = '';
            //             this.completed = true;

            //             flash('Your reply has been posted.');

            //             this.$emit('created', data);
            //         });
            // },

            /**
             * Destroy the given memo.
             */
            destroy(memo) {
                axios.delete('memos/' + memo.id, {}, {
                        headers: {
                            'Accept': 'application/json',
                            // 'Content-Type': 'application/x-www-form-urlencoded',
                            // 'Content-Type': 'multipart/form-data',
                            'Content-Type': 'application/json',
                        }
                    }
                )
                .then(response => {
                    this.getMemos();
                });
            }
        }
    }
</script>
