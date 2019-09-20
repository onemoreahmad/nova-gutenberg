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
            console.log(this.direction);

            if (!Laraberg.editor) {
                Laraberg.init(this.field.name, {
                    laravelFilemanager: true,
                });

                novaGuttenbergCopy = document.getElementById(Laraberg.editor.id)
            } else {
                $(novaGuttenbergCopy).insertBefore(`#${this.field.name}`);
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
                  <textarea ref="content" hidden :value="value" :name="field.name" :id="field.name"
                            :placeholder="field.name"
                  ></textarea>
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
</style>
