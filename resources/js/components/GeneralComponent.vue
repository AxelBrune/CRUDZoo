<template>
    <div class="container">
        <h1>Liste de tous les animaux</h1> <br/>
        <div class="form-row">
            <div class="col-row">
                <input type="text" class="form-control" @keyup="search" v-model="q" placeholder="Rechercher un animal"/>
            </div>
        </div>
        <add-animal @animal-added="refresh"></add-animal>
        <ul class="list-group" v-for="animal in animals.data">
                <li class="list-group-item d-flex justify-content-between align-items-center" :key="animal.id">
                    <p>{{ animal.name }}</p>
                    <div>
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editModal" @click="getAnimal(animal.id)">
                            Éditer
                        </button>
                        <button type="button" class="btn btn-danger" @click="deleteAnimal(animal.id)">Supprimer</button>
                    </div>  
                </li>
                <edit-animal v-bind:animalToEdit="animalToEdit"></edit-animal>
        </ul>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                animals: {},
                animalToEdit: "",
                attribute: "",
                q: ""
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
            },
            getAnimal(id){
                axios.get("http://crudapp.test:81/animal/edit/"+id)
                .then(response => this.animalToEdit = response.data)
                .catch(err => console.log(err));
            },
            deleteAnimal(id){
                axios.delete("http://crudapp.test:81/animal/"+id)
                .then(response => this.animals = response)
                .catch(err => console.log(err));
            },
            search(){
                if(this.q.length > 2){
                    axios.get('http://crudapp.test:81/animalsList/'+this.q)
                    .then(response => this.animals = response)
                    .catch(err => console.log(err));
                }
                else{
                    axios.get('http://crudapp.test:81/animalsList')
                    .then(response => this.animals = response)
                    .catch(err => console.log(err));
                }
            }
        }
    }
</script>
