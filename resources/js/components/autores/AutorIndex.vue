<template>
    <!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">

            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">            
        </head>
        <body>

            <div class="container">
                <div class="livros__list table  my-3">
                        
                    <div class="customers__titlebar dflex justify-content-between align-items-center">
                        <div class="customers__titlebar--item">
                            <h1 class="my-1">Autores</h1>
                        </div>
                        <div class="customers__titlebar--item">
                            <button @click="newAutores" class="btn btn-secondary my-1" >
                                Adicionar Autor
                            </button>
                        </div>
                    </div>
                    <div class="table-search">
                        <div>
                            <button class="search-select">
                                Pesquisar Autor
                            </button>
                        </div>
                        <div class="relative">
                            <input class="search-input" type="text" name="search" placeholde="Seach autor..." v-model="searchQuery">
                        </div>
                    </div>
                    <div class="table--heading mt-2 list_heading " style="padding-top: 20px;background:#FFF">
                        <p class="table--heading--col">
                            Autor
                        </p>
                        <p class="table--heading--col">Ano nascimento</p>
                        <p class="table--heading--col">
                            Sexo
                        </p>
                        <p class="table--heading--col">
                            Nacionalidade
                        </p>
                        <p class="table--heading--col actions">Ações</p>
                    </div>

                    <div class="table--items list_item" v-for="autor in autores" :key="autor.id" >
                        <p class="table--items--col">
                            {{autor.nome}}
                        </p>
                        <p class="table--items--col">
                            {{autor.ano_nascimento}}
                        </p>
                        <p class="table--items--col">
                            {{autor.sexo}}
                        </p>
                        <p class="table--items--col">
                            {{autor.nacionalidade}}
                        </p> 
                        
                        <div>     
                            <button class="btn-icon btn-icon-success" @click="onEdit(autor.id)" >
                                <i class="fas fa-pencil-alt"></i>
                            </button>
                            <button class="btn-icon btn-icon-danger" @click="deleteAutor(autor.id)">
                                <i class="far fa-trash-alt"></i>
                            </button>
                        </div>
                    </div>
                    <div class="table-paginate mt-3">
                        <div class="pagination">
                            <a 
                            href="#" 
                            class="btn" 
                            v-for="(link, index) in links"
                            :key="index"
                            :class="{active: link.active, disabled: !link.url}"
                            @click="changePage(link)"
                            v-html="translateLabel(link.label)"
                            ></a>
                        </div>
                    </div>
                </div>
            </div>
        </body>
    </html>
</template>

<script setup>
    import { useAutores } from "@/composables/autores";

    const {
        autores,
        links,
        searchQuery,
        newAutores,
        getAutores,
        changePage,
        onEdit,
        deleteAutor,
        translateLabel
    } = useAutores();
</script>