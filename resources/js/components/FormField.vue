<script>
    import {FormField, HandlesValidationErrors} from 'laravel-nova'

    window.novaGuttenbergCopy = false;

    export default {
        mixins: [
            FormField,
            HandlesValidationErrors,
        ],

        props: [
            'field',
            'resourceId',
            'resourceName',
        ],

        mounted: function () {
            if (!Laraberg.editor) {
                window.resourceId = this.resourceId;
                window.resourceName = this.resourceName;

                Laraberg.init(this.field.name, {
                    laravelFilemanager: true,
                });

                novaGuttenbergCopy = document.getElementById(Laraberg.editor.id);
            } else {
                $(novaGuttenbergCopy).insertBefore(`#${this.field.name}`);

                setTimeout(() => {
                    Laraberg.setContent(this.field.value || "");
                }, 0)
            }
        },


        methods: {
            setInitialValue: function () {
                this.value = this.field.value || '';
            },

            fill: function (formData) {
                formData.append(this.field.attribute, Laraberg.getContent());
            },

            handleChange: function (value) {
                this.value = value;
            },
        },
        computed: {
            direction() {
                return this.field.direction || 'ltr';
            }
        }
    }
</script>

<template>
    <default-field :field="field" :errors="errors" :fullWidthContent="true">
        <template slot="field">
            <div :class="direction === 'rtl' ? 'rtl-direction': 'ltr-direction'">
                  <textarea ref="content" :name="field.name" :id="field.name"
                            :placeholder="field.name" :value="value" hidden></textarea>
            </div>
        </template>
    </default-field>
</template>

<style lang="scss">
    .rtl-direction .editor-writing-flow {
        direction: rtl;
    }

    .ltr-direction .editor-writing-flow {
        direction: ltr;
    }

    .ltr-content {
        direction: ltr;
    }

    .rtl-content {
        direction: rtl;
    }

    // Hide "return" button
    .edit-post-fullscreen-mode-close__toolbar {
        display: none;
    }
</style>
