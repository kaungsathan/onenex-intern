<template>
    <div class="coupon">
        <h1>Coupon</h1>
        <!-- <div v-html="allqr"></div> -->
        <div class="container">
            <div class="row">
                <div class="col" v-for="(v,i) in allqr" :key="i">
                    <div class="card">
                        <div class="card-header">
                            Qr Code
                        </div>
                        <div class="card-body">
                            <blockquote class="blockquote mb-0">
                                <div v-html="v"></div>
                            </blockquote>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";

    export default {
        name: 'CouponView',
        data() {
            return {
                allqr: [],
                result: [],
            }
        },
        mounted() {
            this.couponLoad();
        },
        methods: {
            couponLoad() {
                axios.get('http://127.0.0.1:8000/api/coupon')
                .then(res => {
                    // console.log(res.data.qrcode);
                    this.result = res.data.qrcode;
                    // console.log(this.result[0]);
                    var length = this.result.length;
                    
                    for (var i = 0; i < length; i++) {
                        this.allqr[i] = atob(this.result[i]);
                    }
                    console.log(this.allqr);                  
                });
            }
        },
    }
</script>

<style lang="scss" scoped>

</style>