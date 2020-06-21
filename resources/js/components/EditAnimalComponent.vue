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
                    <div class="form-group">
                        <label>Comment décrire son attribut (écailles pour un reptiles, fourrure pour un mammifère ou plumes pour un oiseau)</label>
                        <input type="text" id="attribute" class="form-control" v-model="animalToEdit.fur"/>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success" data-dismiss="modal">Enregistrer</button>
            </div>
            </div>
        </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['animalToEdit'],

        methods: {
            //update() {
            //     axios.patch("http://crudapp.test:81/tasks/edit/"+this.taskToEdit.id, {
            //         name: this.taskToEdit.name
            //     })
            //     .then(response => this.$emit('task-updated', response))
            //     .catch(err => console.log(err));
            // }
        }
    }
</script>