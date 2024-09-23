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
                        <v-select
                        v-model="form.fk_autor"
                        :options="autores"
                        label="nome"
                        :reduce="autor => autor.id"
                        placeholder="Selecione um autor"
                        />
                        <small style="color:red" v-if="errors.fk_autor">{{ errors.fk_autor }}</small>
                    </div>
                    <hr>
                    <div class="my-3">
                        <p>Editora</p>
                        <v-select
                        v-model="form.fk_editora"
                        :options="editoras"
                        label="nome"
                        :reduce="editora => editora.id"
                        placeholder="Selecione uma editora"
                        />
                        <small style="color:red" v-if="errors.fk_editora">{{ errors.fk_editora }}</small>
                    </div>
                    <hr>
                    <div class="my-3">
                        <p>Gênero</p>
                        <v-select
                        v-model="form.fk_genero"
                        :options="generos"
                        label="nome"
                        :reduce="genero => genero.id"
                        placeholder="Selecione uma genero"
                        />
                        <small style="color:red" v-if="errors.fk_genero">{{ errors.fk_genero }}</small>
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
    import vSelect from 'vue-select';
    import 'vue-select/dist/vue-select.css';

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