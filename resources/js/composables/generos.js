import { ref, onMounted, watch } from "vue";
import { useRouter } from "vue-router";
import axios from "axios";
import Swal from "sweetalert2";

export function useGeneros() {
    const router = useRouter();

    const generos = ref([]);
    const links = ref([]);
    const searchQuery = ref('');

    onMounted(async () => {
        getGeneros();
    });

    watch(searchQuery, () => {
        getGeneros();
    });

    const newGeneros = () => {
        router.push('generos/create');
    };

    const getGeneros = async () => {
        let response = await axios.get(`/generos?&searchQuery=${searchQuery.value}`);
        generos.value = response.data.generos.data;
        links.value = response.data.generos.links;
    };

    const changePage = (link) => {
        if (!link.url || link.active) {
            return;
        }
        axios.get(link.url).then((response) => {
            generos.value = response.data.generos.data;
            links.value = response.data.generos.links;
        });
    };

    const onEdit = (id) => {
        router.push(`/generos/${id}/edit`);
    };

    const deleteGenero = (id) => {
        Swal.fire({
            title: "Tem certeza?",
            text: "Não será possível reverter!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Sim, Quero excluir!",
            cancelButtonText: "Cancelar"
        }).then((result) => {
            if (result.isConfirmed) {
                axios.delete(`/genero/${id}`).then(() => {
                    Swal.fire({
                        title: "Deletado!",
                        text: "O registro foi deletado.",
                        icon: "success"
                    });
                    getGeneros();
                });
            }
        });
    };

    const translateLabel = (label) => {
        if (label === '&laquo; Previous') return '&laquo; Anterior';
        if (label === 'Next &raquo;') return 'Próximo &raquo;';
        return label;
    };

    return {
        generos,
        links,
        searchQuery,
        newGeneros,
        getGeneros,
        changePage,
        onEdit,
        deleteGenero,
        translateLabel
    };
}