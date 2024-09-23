<template>
    <div class="livros__create ">
        <div class="livros__create__titlebar dflex justify-content-between align-items-center">
            <div class="livros__create__titlebar--item">
                
                <h1 class="my-1">
                    <span v-if="editMode">Editar</span> 
                    <span v-else="editMode">Adicionar</span> 
                    Livro</h1>
            </div>
            <div class="livros__create__titlebar--item">
                
                <button @click="handleSave" class="btn btn-secondary ml-1" >
                    Salvar
                </button>
            </div>
        </div>

        <div class="livros__create__cardWrapper mt-2">
            <div class="livros__create__main">
                <div class="livros__create__main--addInfo card py-2 px-2 bg-white">
                    <p class="mb-1">Título</p>
                    <input type="text" class="input" v-model="form.titulo" >
                    <small style="color:red" v-if="errors.titulo">{{ errors.titulo }}</small>

                    <p class="my-1">Ano Lançamento</p>
                    <input type="date" class="input" v-model="form.ano_lancamento" />
                    <small style="color:red" v-if="errors.ano_lancamento">{{ errors.ano_lancamento }}</small>
                </div>

            </div>
            <div class="livros__create__sidebar">
                <div class="card py-2 px-2 bg-white">                    
                    <div class="my-3">
                        <p>Autor</p>
                        <select v-model="form.fk_autor" class="input">
                            <option disabled value="">Selecione um autor</option>
                            <option v-for="autor in autores" :key="autor.id" :value="autor.id">
                                {{ autor.nome }}
                            </option>
                        </select>
                        <small style="color:red" v-if="errors.fk_autor">{{ errors.fk_autor }}</small>
                    </div>
                    <hr>
                    <div class="my-3">
                        <p>Editora</p>
                        <select v-model="form.fk_editora" class="input">
                            <option disabled value="">Selecione uma editora</option>
                            <option v-for="editora in editoras" :key="editora.id" :value="editora.id">
                                {{ editora.nome }}
                            </option>
                        </select>
                        <small style="color:red" v-if="errors.fk_autor">{{ errors.fk_editora }}</small>
                    </div>
                    <hr>
                    <div class="my-3">
                        <p>Genero</p>
                        <select v-model="form.fk_genero" class="input">
                            <option disabled value="">Selecione um genero</option>
                            <option v-for="genero in generos" :key="genero.id" :value="genero.id">
                                {{ genero.nome }}
                            </option>
                        </select>
                        <small style="color:red" v-if="errors.fk_autor">{{ errors.fk_genero }}</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="dflex justify-content-between align-items-center my-3">
            <p ></p>
            <button @click="handleSave" class="btn btn-secondary" >Salvar</button>
        </div>
    </div>
</template>

<script setup>
    import { useLivroForm } from "@/composables/livroForm";

    const {
        form,
        errors,
        autores,
        editoras,
        generos,
        editMode,
        handleSave
    } = useLivroForm();
</script>