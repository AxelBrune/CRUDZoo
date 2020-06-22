<template>
    <div class="container">
        <h1>Liste de tous les animaux</h1> <br/>
        <div class="form-row">
            <div class="col-row">
                <input type="text" class="form-control" @keyup="search" v-model="q" placeholder="Rechercher un animal"/>
            </div>
        </div>
        <add-animal @animal-added="refresh"></add-animal>
        <table class="table table-bordered">
            <thead>
                <tr>
                <th scope="col" class="text-center">Nom de l'animal</th>
                <th scope="col" class="text-center">Description de l'animal</th>
                <th scope="col" class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="animal in animals.data" :class="animal.color">
                    <td>{{ animal.name }}</td>
                    <td v-if="animal.fur !== null">Je suis un(e) {{ animal.name }} et ma fourrure est {{ animal.fur }}</td>
                    <td v-if="animal.feathers !== null">Je suis un(e) {{ animal.name }} et mes plumes sont {{ animal.feathers }}</td>   
                    <td v-if="animal.scale !== null">Je suis un(e) {{ animal.name }} et mes écailles sont {{ animal.scale }}</td>                       
                    <td class="text-center">
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editModal" @click="getAnimal(animal.id)" >
                                Éditer
                            </button>
                            <button type="button" class="btn btn-danger" @click="deleteAnimal(animal.id)">Supprimer</button>
                    </td>
                    <edit-animal v-bind:animalToEdit="animalToEdit" @animal-updated="refresh"></edit-animal>
                </tr>
            </tbody>
        </table>
        <add-animal @animal-added="refresh"></add-animal>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                animals: {},
                animalToEdit: "",
                q: "",
            }
        },
        created(){
            axios.get('/animalsList')
            .then(response => {this.animals = response})
            .catch(error => console.log(error));
        },
        mounted() {
            console.log('GeneralComponent mounted.');
        },
        methods: {
            refresh(animals){
                this.animals=animals;
            },
            getAnimal(id){
                axios.get("/animal/edit/"+id)
                .then(response => this.animalToEdit = response.data)
                .catch(err => console.log(err));
            },
            deleteAnimal(id){
                axios.delete("/animal/"+id)
                .then(response => this.animals = response)
                .catch(err => console.log(err));
            },
            search(){
                if(this.q.length > 1){
                    axios.get('/animalsList/'+this.q)
                    .then(response => this.animals = response)
                    .catch(err => console.log(err));
                }
                else{
                    axios.get('/animalsList')
                    .then(response => this.animals = response)
                    .catch(err => console.log(err));
                }
            }
        }
    }
</script>
