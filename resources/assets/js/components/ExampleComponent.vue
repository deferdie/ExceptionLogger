<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        {{message}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        created()
        {
            let self = this;
            Echo.channel('message').listen('MessageWasSent', (e) => {
                self.message = e.message;
            });
        },
        data: function()
        {
            return {
                message : null
            }
        }
    }
</script>
