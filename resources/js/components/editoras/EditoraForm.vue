<template>
    <div class="livros__create ">
        <div class="livros__create__titlebar dflex justify-content-between align-items-center">
            <div class="livros__create__titlebar--item">
                
                <h1 class="my-1">
                    <span v-if="editMode">Editar</span> 
                    <span v-else="editMode">Adicionar</span> 
                    Editora</h1>
            </div>
            <div class="livros__create__titlebar--item">
                
                <button @click="handleSave" class="btn btn-secondary ml-1" >
                    Salvar
                </button>
            </div>
        </div>

        <div class="editoras__create__cardWrapper mt-2">
            <div class="livros__create__main">
                <div class="livros__create__main--addInfo card py-2 px-2 bg-white">
                    <p class="mb-1">Nome</p>
                    <input type="text" class="input" v-model="form.nome" >
                    <small style="color:red" v-if="errors.nome">{{ errors.nome }}</small>
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
    import { useEditoraForm } from "@/composables/editoraForm";

    const {
        form,
        errors,
        editMode,
        handleSave
    } = useEditoraForm();
</script>