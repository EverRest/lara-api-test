<style>

    .list {
        margin: 30px 0;
    }
    .list-ul {
        list-style-type: none;
        text-align: left;
    }
    .list-title {
        margin: 25px 0;
    }
</style>

<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="list">
                    <div class="people-header">
                        <h3 class="list-title">People List</h3>
                    </div>
                    <div class="people-body">
                        <ul id="v-for-people" class="list-ul">
                            <show v-for="(man,i) in people" :key="man.url" :index="(i+1)" :man="man"></show>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import PeopleShow from './PeopleShow';

    export default {
        components: {
            'show': PeopleShow
        },
        data: function () {
          return {
              people: [],
          }
        },
        mounted() {
            let app = this;
            axios.get('/api/people/')
            .then(function (res) {
                app.people = res.data.results;
            }).
            catch(function (res) {
                console.log(res);
            });
        }
    }
</script>
