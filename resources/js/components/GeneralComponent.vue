<template>
    <div class="container">
        <h1>Liste de tous les animaux</h1> <br/>
       <!-- <ul class="list-group" v-for="step in animals.data">
            <li class="list-group-item d-flex justify-content-between align-items-center" v-for="el in step" :key="el.id">
                    <p>{{ el.name }}</p>
                    <div>
                        <button type="button" class="btn btn-warning" >
                            Éditer
                        </button>
                        <button type="button" class="btn btn-danger" @click="deleteTask(task.id)">Supprimer</button>
                    </div>  
            </li>
        </ul> -->
        <add-animal @animal-added="refresh"></add-animal>
        <ul class="list-group" v-for="animal in animals.data">
                <li class="list-group-item d-flex justify-content-between align-items-center" :key="animal.id">
                    <p>{{ animal.name }}</p>
                    <div>
                        <button type="button" class="btn btn-warning" >
                            Éditer
                        </button>
                        <button type="button" class="btn btn-danger">Supprimer</button>
                    </div>  
                </li>
        </ul>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                animals: {},
            }
        },
        created(){
            axios.get('http://crudapp.test:81/animalsList')
            .then(response => {
                  this.animals = response
                //  console.log(response)
            })
            .catch(error => console.log(error));
        },
        mounted() {
            console.log('GeneralComponent mounted.')
        },
        methods: {
            refresh(animals){
                this.animals=animals;
            }
        }
    }
</script>
