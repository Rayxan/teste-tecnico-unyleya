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
                            <h1 class="my-1">Editoras</h1>
                        </div>
                        <div class="customers__titlebar--item">
                            <button @click="newEditoras" class="btn btn-secondary my-1" >
                                Adicionar Editora
                            </button>
                        </div>
                    </div>
                    <div class="table-search">
                        <div>
                            <button class="search-select">
                                Pesquisar Editora
                            </button>
                        </div>
                        <div class="relative">
                            <input class="search-input" type="text" name="search" placeholde="Seach editora..." v-model="searchQuery">
                        </div>
                    </div>
                    <div class="table--heading mt-2 list_heading " style="padding-top: 20px;background:#FFF">
                        <p class="table--heading--col">
                            Editora
                        </p>
                        <p class="table--heading--col">Ações</p>
                    </div>

                    <div class="table--items list_item" style="gap:226px" v-for="editora in editoras" :key="editora.id" >
                        <p class="table--items--col">
                            {{editora.nome}}
                        </p>
                        <div>     
                            <button class="btn-icon btn-icon-success" @click="onEdit(editora.id)" >
                                <i class="fas fa-pencil-alt"></i>
                            </button>
                            <button class="btn-icon btn-icon-danger" @click="deleteEditora(editora.id)">
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
    import { useEditoras } from "@/composables/editoras";

    const {
        editoras,
        links,
        searchQuery,
        newEditoras,
        getEditoras,
        changePage,
        onEdit,
        deleteEditora,
        translateLabel
    } = useEditoras();
</script>