import { ref, onMounted, watch } from "vue";
import { useRouter } from "vue-router";
import axios from "axios";
import Swal from "sweetalert2";
import dayjs from 'dayjs';

export function useAutores() {
    const router = useRouter();

    const autores = ref([]);
    const links = ref([]);
    const searchQuery = ref('');

    onMounted(async () => {
        getAutores();
    });

    watch(searchQuery, () => {
        getAutores();
    });

    const newAutores = () => {
        router.push('autores/create');
    };

    const getAutores = async () => {
        let response = await axios.get(`/autores?&searchQuery=${searchQuery.value}`);
        autores.value = response.data.autores.data;
        links.value = response.data.autores.links;
    };

    const changePage = (link) => {
        if (!link.url || link.active) {
            return;
        }
        axios.get(link.url).then((response) => {
            autores.value = response.data.autores.data;
            links.value = response.data.autores.links;
        });
    };

    const onEdit = (id) => {
        router.push(`/autores/${id}/edit`);
    };

    const deleteAutor = (id) => {
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
                axios.delete(`/autor/${id}`).then(() => {
                    Swal.fire({
                        title: "Deletado!",
                        text: "O registro foi deletado.",
                        icon: "success"
                    });
                    getAutores();
                });
            }
        });
    };

    const translateLabel = (label) => {
        if (label === '&laquo; Previous') return '&laquo; Anterior';
        if (label === 'Next &raquo;') return 'Próximo &raquo;';
        return label;
    };

    const formatarData = (dataISO) => {
        return dayjs(dataISO).format('DD/MM/YYYY');
    };

    return {
        autores,
        links,
        searchQuery,
        newAutores,
        getAutores,
        changePage,
        onEdit,
        deleteAutor,
        translateLabel,
        formatarData
    };
}