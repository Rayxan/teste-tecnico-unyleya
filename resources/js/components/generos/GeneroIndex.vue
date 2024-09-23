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
                            <h1 class="my-1">Gêneros</h1>
                        </div>
                        <div class="customers__titlebar--item">
                            <button @click="newGeneros" class="btn btn-secondary my-1" >
                                Adicionar Gênero
                            </button>
                        </div>
                    </div>
                    <div class="table-search">
                        <div>
                            <button class="search-select">
                                Pesquisar Gênero
                            </button>
                        </div>
                        <div class="relative">
                            <input class="search-input" type="text" name="search" placeholde="Seach genero..." v-model="searchQuery">
                        </div>
                    </div>
                    <div class="table--heading mt-2 livros__list__heading " style="padding-top: 20px;background:#FFF">
                        <p class="table--heading--col">
                            Gênero
                        </p>
                        <p class="table--heading--col">Ações</p>
                    </div>

                    <div class="table--items livros__list__item" style="gap:175px" v-for="genero in generos" :key="genero.id" >
                        <p class="table--items--col">
                            {{genero.nome}}
                        </p>
                        <div>     
                            <button class="btn-icon btn-icon-success" @click="onEdit(genero.id)" >
                                <i class="fas fa-pencil-alt"></i>
                            </button>
                            <button class="btn-icon btn-icon-danger" @click="deleteGenero(genero.id)">
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
    import { useGeneros } from "@/composables/generos";

    const {
        generos,
        links,
        searchQuery,
        newGeneros,
        getGeneros,
        changePage,
        onEdit,
        deleteGenero,
        translateLabel
    } = useGeneros();
</script>