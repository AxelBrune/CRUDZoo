<template>
    <div>
        <button type="button" class="btn btn-primary my-3" data-toggle="modal" data-target="#exampleModal">
            Ajouter un animal
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ajout d'un animal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label>Nom de l'animal : </label>
                        <input type="text" id="name" class="form-control"
                            v-model="name"
                        />
                    </div>
                    <div class="form-group">
                        <label>Type de l'animal : </label>
                        <select class="form-control" v-model="type">
                            <option style="background-color: #c7eed8">Reptile</option>
                            <option style="background-color: #c6e0f5">Mammifère</option>
                            <option style="background-color: #f7c6c5">Oiseau</option>
                        </select>
                    </div>
                    <div class="form-group" v-if="type === 'Reptile'">
                        <label>Ses écailles sont : </label>
                        <input type="text" id="attribute" class="form-control" v-model="attribute"/>
                    </div>
                    <div class="form-group" v-if="type === 'Mammifère'">
                        <label>Son pelage est : </label>
                        <input type="text" id="attribute" class="form-control" v-model="attribute"/>
                    </div>
                    <div class="form-group" v-if="type === 'Oiseau'">
                        <label>Ses plumes sont : </label>
                        <input type="text" id="attribute" class="form-control" v-model="attribute"/>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                <button type="submit" class="btn btn-success" data-dismiss="modal" @click="storeAnimal">Ajouter</button>
            </div>
            </div>
        </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                name: "",
                attribute: "",
                type: "",
                couleur_reptile: "table-success",
                couleur_mammifere: "table-primary",
                couleur_oiseau: "table-danger"
            }
        },

        methods: {
             storeAnimal() {
                 if(this.type === "Reptile"){
                    axios.post('/animalsList', {
                       name: this.name,
                       type: this.type,
                       scale: this.attribute,
                       color: this.couleur_reptile
                   })
                   .then(response => this.$emit('animal-added', response))
                   .catch(err => console.log(err));
                 }
                 else if (this.type === "Mammifère"){
                     axios.post('/animalsList', {
                       name: this.name,
                       type: this.type,
                       fur: this.attribute,
                       color: this.couleur_mammifere
                   })
                   .then(response => this.$emit('animal-added', response))
                   .catch(err => console.log(err));
                 }
                 else{
                     axios.post('/animalsList', {
                       name: this.name,
                       type: this.type,
                       feathers: this.attribute,
                       color: this.couleur_oiseau
                   })
                   .then(response => this.$emit('animal-added', response))
                   .catch(err => console.log(err));
                 }
                 

             }
        }
        
    }
</script>