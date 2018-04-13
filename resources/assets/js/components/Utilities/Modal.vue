<template>
    <div>
        <div class="modal fade" tabindex="-1" role="dialog" :id="id" v-bind:class="{'in': showModal===true, 'out': showModal===false}"
             v-bind:style="{'display':(showModal===true?'block':'none')}">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><slot name="heading"></slot></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <slot></slot>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary"><slot name="footer"></slot></button>
                </div>
                </div>
            </div>
        </div>
        <div class="modal-backdrop fade" v-bind:class="{'in':(showModal===true), 'out':(showModal===false)}"
             v-bind:style="{'display':(showModal===true)?'block':'none'}"></div>
    </div>
</template>

<script>
    export default {
        props: ['id', 'showModal'],
    }
</script>