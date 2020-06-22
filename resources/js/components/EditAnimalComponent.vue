<template>
    <div>
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modification d'un animal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
             <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label>Nom de l'animal : </label>
                        <input type="text" id="name" class="form-control"
                            v-model="animalToEdit.name"
                        />                        
                    </div>
                    <div class="form-group">
                        <label>Type de l'animal : </label>
                        <select class="form-control" v-model="animalToEdit.type">
                            <option>Reptile</option>
                            <option>Mammifère</option>
                            <option>Oiseau</option>
                        </select>
                    </div>
                    <div class="form-group" v-if="animalToEdit.type === 'Reptile'">
                        <label>Ses écailles sont : </label>
                        <input type="text" id="attribute" class="form-control" v-model="animalToEdit.scale"/>
                    </div>
                    <div class="form-group" v-if="animalToEdit.type === 'Mammifère'">
                        <label>Son pelage est : </label>
                        <input type="text" id="attribute" class="form-control" v-model="animalToEdit.fur"/>
                    </div>
                    <div class="form-group" v-if="animalToEdit.type === 'Oiseau'">
                        <label>Ses plumes sont : </label>
                        <input type="text" id="attribute" class="form-control" v-model="animalToEdit.feathers"/>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success" data-dismiss="modal" @click="update">Enregistrer</button>
            </div>
            </div>
        </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['animalToEdit'],
        data(){
            return{
                couleur_reptile: "table-success",
                couleur_mammifere: "table-primary",
                couleur_oiseau: "table-danger",
                attribut: ""
            }
        },
        methods: {
            update(){             
                 if(this.animalToEdit.type == "Reptile"){
                     axios.patch("http://crudapp.test:81/animal/edit/"+this.animalToEdit.id, {
                         name: this.animalToEdit.name,
                         type: this.animalToEdit.type,
                         color: this.couleur_reptile,
                         scale: this.animalToEdit.scale,
                         fur: null,
                         feathers: null                       
                     })
                     .then(response => this.$emit('animal-updated', response))
                     .catch(err => console.log(err));
                  }
                  else if (this.animalToEdit.type == "Mammifère"){
                      axios.patch("http://crudapp.test:81/animal/edit/"+this.animalToEdit.id, {
                         name: this.animalToEdit.name,
                         type: this.animalToEdit.type,
                         color: this.couleur_mammifere,
                         fur: this.animalToEdit.fur,
                         scale: null,
                         scale: null
                     })
                     .then(response => this.$emit('animal-updated', response))
                     .catch(err => console.log(err));
                  }
                  else{
                      axios.patch("http://crudapp.test:81/animal/edit/"+this.animalToEdit.id, {
                         name: this.animalToEdit.name,
                         type: this.animalToEdit.type,
                         color: this.couleur_oiseau,
                         feathers: this.animalToEdit.feathers,
                         fur: null,
                         scale: null
                     })
                     .then(response => this.$emit('animal-updated', response))
                     .catch(err => console.log(err));
                  }
            }
        }
    }
</script>