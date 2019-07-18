<style>
    .people-list-li p {
        text-align: left;
    }
    .people-list-li a {
        text-align: right;
        padding-left: 20px;
        color: #1d2124;
    }
    .color-success {
        color: #2d995b;
    }
</style>
<template>
    <li class="people-list-li">
        <p>
            <span :class="[ seen ? 'color-success' : '' ]">
                <i class="fas fa-user-circle" ></i>
            </span>
            <span>
                {{man.name}}
            </span>
            <a href="#" class="" @click="viewDetails"><i :class="[seen ? 'fas fa-angle-double-down' : 'fas fa-angle-double-up']"></i></a>
        </p>
        <div class="panel" v-if="seen">
            <hr>

            <p>
                <strong>Height: </strong><span>{{details.height}}</span>
            </p>
            <p>
                <strong>Mass: </strong><span>{{details.mass}}</span>
            </p>
            <p>
                <strong>Eye color: </strong><span>{{details.eye_color}}</span>
            </p>
            <p>
                <strong>Gender: </strong><span>{{details.gender}}</span>
            </p>
            <p>
                <strong>YOB: </strong><span>{{details.birth_year}}</span>
            </p>

            <hr>
        </div>
    </li>
</template>

<script>
    export default {
        props:{
            man: {
                type: Object,
                required: true
            },
            index: {
                type: Number
            }
        },
        data() {
            return {
                details: false,
                seen: false
            }
        },
        methods: {
            viewDetails() {
                let app = this;
                // Here must be Obj.id but i should take from url
                axios.get('/api/people/' + this.getId(app.man.url))
                    .then(function (res) {
                        if(!app.details) app.details = res.data;
                        app.seen = !app.seen;
                    }).
                catch(function (res) {
                    console.log(res);
                });
            },
            getId(str) {
                const pattern = /\/(\d+)/;
                return parseInt(str.match(pattern)[1]);
            }
        },
        mounted() {
        }
    }
</script>
