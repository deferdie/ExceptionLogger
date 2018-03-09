<template>
    <div>
        <h4>Manage project status codes</h4>

        <div class="row">
            <div class="col-md-4">
                <table class="table table-striped table-hover table-bordered" style="margin-bottom: 0px;">
                    <thead>
                        <tr>
                            <td>Status</td>
                            <td>Errors</td>
                            <td>Time to notify</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-show="statusCodes == null">
                            <td>
                                No status codes are being watched. (Click To add)
                            </td>
                            <td></td>
                            <td></td>
                        </tr>
                        
                        <tr v-show="statusCodes != null" v-for="statusCode in statusCodes">
                            <td>
                                {{statusCode.code}}
                            </td>
                            <td>
                                {{statusCode.errors}}
                            </td>
                            <td>
                                {{statusCode.timeToNotify}}
                            </td>
                        </tr>
                    </tbody>
                </table>

                <button class="btn btn-block btn-primary" style="border-radius: 0px;" v-show="!creatingStatus" @click="creatingStatus = true">
                    Add Status
                </button>

                <div class="form" v-show="creatingStatus">
                    <div class="col-md-4 form-group">
                        <label for="newStatus">Status Code</label>
                        <input type="text" id="newStatus" class="form-control" v-model="newStatus.code">
                    </div>
                    <div class="col-md-4">
                        <label for="errors">Errors</label>
                        <input type="number" id="errors" class="form-control" v-model="newStatus.errors" />
                    </div>
                    <div class="col-md-4">
                        <label for="notifyTime">Time to be notified after errors has occoured</label>
                        <input type="number" id="notifyTime" class="form-control" v-model="newStatus.timeToNotify" />
                    </div>
                </div>

                <button class="btn btn-block btn-primary" style="border-radius: 0px;"  v-show="creatingStatus" @click="createStatus()">
                    Save
                </button>
            </div>
        </div>
    </div>
</template>

<script>
    export default{
        props: ['createdstatuscodes', 'project'],

        mounted()
        {
            this.statusCodes = this.createdstatuscodes;
        },

        data: function()
        {
            return {
                statusCodes: null,
                creatingStatus: false,
                newStatus: {code: null, timeToNotify: null, errors: null}
            }
        },

        methods: {
            createStatus: function()
            {
                let self = this;

                axios.post('/project/'+self.project+'/statusCode', {
                    code: self.newStatus.code,
                    timeToNotify: self.newStatus.timeToNotify,
                    errors: self.newStatus.errors
                })
                .then(function (response) {
                    self.statusCodes = response.data;
                })
                .catch(function (error) {
                    console.log(error);
                });

                self.newStatus.code = null;
                self.newStatus.timeToNotify = null;
                self.newStatus.errors = null;
                self.creatingStatus = false;
            }
        }
    }
</script>
