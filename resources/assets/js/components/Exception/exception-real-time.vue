<template>
    <div>
        <div>
            <h4>Realtime Exceptions</h4>
        </div>

        <table class="table table-striped table-responsive">
            <thead>
                <tr>
                    <td>Project</td>
                    <td>Exception Count</td>
                    <td>Status Code</td>
                    <td>URL</td>
                    <td>Request URI</td>
                    <td>Line Number</td>
                    <td>Server Name</td>
                </tr>
            </thead>
            <tbody>
                <tr v-for="exception in exceptions">
                    <td>{{exception.project_id}}</td>
                    <td>{{exception.exception_count}}</td>
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

                self.updateException(e)

            });
        },
        mounted()
        {
            let self = this;
            
            _.forEach(this.loadexceptions.data, function(value) {
                self.exceptions.push(value);
            });
        },

        data: function()
        {
            return {
                exceptions : []
            }
        },
        methods: {
            updateException: function(e)
            {
                let exceptionToAdd = e.exception;

                let self = this;

                // Find item index using _.findIndex (thanks @AJ Richardson for comment)
                var index = _.findIndex(self.exceptions, {project_unique_exception_id: exceptionToAdd.project_unique_exception_id});

                if(index > 0)
                {
                    // Replace item at index using native splice
                    self.exceptions.splice(index, 1, exceptionToAdd);
                    return;
                }

                
                // Replace item at index using native splice
                self.exceptions.push(exceptionToAdd);

            }
        }
    }
</script>

