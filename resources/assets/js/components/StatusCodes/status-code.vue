<template>
    <div>
        <h4>Manage project status codes</h4>

        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped table-hover table-bordered" style="margin-bottom: 0px;">
                    <thead>
                        <tr>
                            <td>Status</td>
                            <td>Errors</td>
                            <td>Time to notify</td>
                            <td>Notify By Email</td>
                            <td>Notify By Slack</td>
                            <td>Notify By Sms</td>
                            <td></td>
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
                                <span v-show="!editMode">{{statusCode.code}}</span>
                                <input type="text" v-if="editMode" v-model="statusCode.code" class="form-control">
                            </td>
                            <td>
                                <span v-show="!editMode">{{statusCode.errors}}</span>
                                <input type="text" v-if="editMode" v-model="statusCode.errors" class="form-control">
                            </td>
                            <td>
                                <span v-show="!editMode">{{statusCode.timeToNotify}}</span>
                                <input type="text" v-if="editMode" v-model="statusCode.timeToNotify" class="form-control">
                            </td>
                            <td>
                                <span v-show="!editMode">
                                    {{statusCode.notification.email}}
                                    <span class="label label-primary" v-show="statusCode.notification.can_email">Enabled</span>
                                    <span class="label label-danger" v-show="!statusCode.notification.can_email">Disabled</span>
                                </span>
                                
                                <span v-show="editMode">
                                    <input type="checkbox" v-model="statusCode.notification.can_email">
                                    <input type="text" v-model="statusCode.notification.email" class="form-control">
                                </span>
                            </td>
                            <td>
                                <span v-show="!editMode">
                                    {{statusCode.notification.slack_channel}}
                                    <span class="label label-primary" v-show="statusCode.notification.can_slack">Enabled</span>
                                    <span class="label label-danger" v-show="!statusCode.notification.can_slack">Disabled</span>
                                </span>
                                
                                <span v-show="editMode">
                                    <input type="checkbox" v-model="statusCode.notification.can_slack">
                                    <input type="text" v-model="statusCode.notification.slack_channel" class="form-control">
                                </span>
                            </td>
                            <td>
                                <span v-show="!editMode">
                                    {{statusCode.notification.slack_sms}}
                                    <span class="label label-primary" v-show="statusCode.notification.can_sms">Enabled</span>
                                    <span class="label label-danger" v-show="!statusCode.notification.can_sms">Disabled</span>
                                </span>
                                
                                <span v-show="editMode">
                                    <input type="checkbox" v-model="statusCode.notification.can_sms">
                                    <input type="text" v-model="statusCode.notification.sms_number" class="form-control">
                                </span>
                            </td>
                            
                            <td>
                                <button class="btn btn-primary" @click="editMode = true" v-show="!editMode">
                                    Edit
                                </button>
                                <button class="btn btn-primary" @click="editStatus(statusCode)" v-show="editMode">
                                    Save
                                </button>
                                <button class="btn btn-warning" @click="editMode = false" v-show="editMode">
                                    Cancel
                                </button>
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
                newStatus: {
                    code: null, 
                    timeToNotify: null, 
                    errors: null, 
                    canEmail: false, 
                    canSlack: false, 
                    canSms: false,
                    email: null,
                    slack: null,
                    sms: null,
                },
                editMode : false
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
            },

            editStatus(statusCode)
            {
                let self = this;

                this.editMode = true;

                console.log(statusCode);

                axios.patch('/project/'+self.project+'/statusCode/'+statusCode.id, {
                    'code': statusCode.code,
                    'timeToNotify': statusCode.timeToNotify,
                    'errors': statusCode.errors,
                    'canEmail': statusCode.notification.can_email,
                    'canSlack': statusCode.notification.can_slack,
                    'canSms': statusCode.notification.can_sms,
                    'email': statusCode.notification.email,
                    'slack': statusCode.notification.slack,
                    'sms': statusCode.notification.sms,
                })
                .then(function (response) {
                    console.log(response.data);
                    statusCode = response.data;
                })
                .catch(function (error) {
                    console.log(error);
                });

                this.editMode = false;
            }
        }
    }
</script>
