<template>
  
  <div>
        <a-row type="flex" align="middle">
            <a-col :span="12">
                <a-row type="flex">
                <a-col :span="20" :offset="2">
                    <a-card title="Card title">
                        <a-form
                            :form="loginForm"
                            method="post"
                            action="#"
                            @submit="handleLoginSubmit"
                        >
                            <a-form-item label="Email Address">
                            <a-input
                                :auto-focus="true"
                                name="email"
                                v-decorator="[
                                'email',
                                {
                                    rules: [
                                        {   required: true, 
                                            message: 'Email Address is required' 
                                        }
                                    ]
                                }
                                ]"
                            />
                            </a-form-item>
                            
                            <a-form-item 
                               
                                label="Password Label">
                                <a-input
                                    name="password"
                                    type="password"
                                    v-decorator="[
                                    'password',
                                    {rules: [{ required: true, message: 'Password is required' }]}
                                    ]"
                                />
                            </a-form-item>
                            
                            <a-form-item>
                                <a-button
                                    type="primary"
                                    :loading="loadingSubmitBtn"
                                    html-type="submit"
                                >
                                    Login Button
                                </a-button>

                                <a class="ml-1" href="#forgot-password-url">Forgot password?</a>
                            </a-form-item>
                        </a-form>
                    </a-card>
                </a-col>
                </a-row>
            </a-col>
        
            <a-col :span="12">
              <a-row type="flex" align="middle" class="h-100 text-center">
              <a-col :span="24">
                    <img 
                        class="height-100"
                        src="/avored-admin/images/avored_admin_login.svg" 
                        width="55%" alt="AvoRed Admin Login" />
                </a-col>
                </a-row>
            </a-col>
        </a-row>
    </div>
</template>

<script>
import gql from 'graphql-tag'
import UserAuth from '../../graphql/UserAuth.gql'
import isNil from 'lodash/isNil'

export default {
  props: { name:'loginpost', type: String },
  data () {
        return {
        loginForm: this.$form.createForm(this),
        loadingSubmitBtn: false
        };
    },
    methods: {
        async handleLoginSubmit(e) {
            console.log(e.preventDefault());
            let values = this.loginForm.getFieldsValue();

            var result = await this.authMutation(values)
            if (!isNil(result.data.adminLogin.access_token)) {
                //localStorage.setItem(AUTH_TOKEN, result.auth.access_token);
                //this.$router.push('/')
                alert(result.data.adminLogin.access_token)
            }
        },
        async authMutation(values) {
            //this.$apollo.client = "auth";
            return this.$apollo.mutate({
                mutation: UserAuth,
                //clientId: 'auth',
                variables: values,
            }).then((data) => {
                console.log(data)
                window.x = data
                return data;
            }).catch((error) => {
                window.y = error;
                //console.error(error);
            });
        }
    }
};
</script>
