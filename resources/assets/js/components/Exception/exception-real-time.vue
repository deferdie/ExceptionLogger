<template>
    <div>
        <div>
            <h4>Realtime Exceptions</h4>
        </div>

        <table class="table table-striped table-responsive">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Project</td>
                    <td>Status Code</td>
                    <td>URL</td>
                    <td>Request URI</td>
                    <td>Line Number</td>
                    <td>Server Name</td>
                </tr>
            </thead>
            <tbody>
                <tr v-for="exception in exceptions">
                    <td>{{exception.id}}</td>
                    <td>{{exception.project_id}}</td>
                    <td>{{exception.status_code}}</td>
                    <td>{{exception.url}}</td>
                    <td>{{exception.request_uri}}</td>
                    <td>{{exception.line_number}}</td>
                    <td>{{exception.server_name}}</td>
                </tr>
            </tbody>
        </table>

    </div>
</template>

<script>
    export default {
        props: ['loadexceptions'],
        created()
        {
            let self = this;

            Echo.channel('exceptionChannel').listen('ExceptionWasRaised', (e) => {
                self.exceptions.unshift(e.exception);
            });
        },
        mounted()
        {
            this.exceptions = this.loadexceptions;
        },

        data: function()
        {
            return {
                exceptions : null
            }
        }
    }
</script>

