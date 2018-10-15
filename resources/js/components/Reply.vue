<template>
    <div :id="'reply-'+id" class="card mb-3" :class="isBest ? 'border-success text-success': ''">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <h5>
                    <a :href="'/profiles/' + reply.owner.name"
                        v-text="reply.owner.name">
                    </a> said <span v-text="ago"></span>
                </h5>

                <div v-if="signedIn">
                    <favorite :reply="reply"></favorite>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div v-if="editing">
                <form @submit="update">
                    <div class="form-group">
                        <wysiwyg v-model="body"></wysiwyg>
                    </div>

                    <button class="btn btn-sm btn-primary">Update</button>
                    <button class="btn btn-sm btn-link" @click="editing = false" type="button">Cancel</button>
                </form>
            </div>

            <div v-else v-html="body"></div>
        </div>

        <div class="card-footer d-flex justify-content-between" v-if="authorize('owns', reply) || authorize('owns', reply.thread)">
            <div>
                <button class="btn btn-sm btn-secondary" @click="editing = true" v-if="authorize('owns', reply) && ! editing">Edit</button>
            </div>
            <div>
                <button class="btn btn-sm btn-secondary" @click="markBestReply" v-if="authorize('owns', reply.thread)">Best Reply?</button>
            </div>
            <div>
                <button class="btn btn-sm btn-danger" @click="destroy" v-if="authorize('owns', reply)">Delete</button>
            </div>
        </div>
    </div>
</template>

<script>
    import Favorite from './Favorite.vue';
    import moment from 'moment';

    export default {
        props: ['reply'],

        components: { Favorite },

        data() {
            return {
                editing: false,
                id: this.reply.id,
                body: this.reply.body,
                isBest: this.reply.isBest,
            };
        },

        computed: {
            ago() {
                return moment(this.reply.created_at).fromNow() + '...';
            }
        },

        created () {
            window.events.$on('best-reply-selected', id => {
                this.isBest = (id === this.id);
            });
        },

        methods: {
            update() {
                axios.patch(
                    '/replies/' + this.id, {
                        body: this.body
                    })
                    .catch(error => {
                        flash(error.response.data, 'danger');
                    });

                this.editing = false;

                flash('Updated!');
            },

            destroy() {
                axios.delete('/replies/' + this.id);

                this.$emit('deleted', this.id);
            },

            markBestReply() {
                axios.post('/replies/' + this.id + '/best');

                window.events.$emit('best-reply-selected', this.id);
            }
        }
    }
</script>
