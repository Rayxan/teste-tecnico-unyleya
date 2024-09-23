import { ref, onMounted, watch } from "vue";
import { useRouter } from "vue-router";
import axios from "axios";
import Swal from "sweetalert2";

export function useEditoras() {
    const router = useRouter();

    const editoras = ref([]);
    const links = ref([]);
    const searchQuery = ref('');

    onMounted(async () => {
        getEditoras();
    });

    watch(searchQuery, () => {
        getEditoras();
    });

    const newEditoras = () => {
        router.push('editoras/create');
    };

    const getEditoras = async () => {
        let response = await axios.get(`/editoras?&searchQuery=${searchQuery.value}`);
        editoras.value = response.data.editoras.data;
        links.value = response.data.editoras.links;
    };

    const changePage = (link) => {
        if (!link.url || link.active) {
            return;
        }
        axios.get(link.url).then((response) => {
            editoras.value = response.data.editoras.data;
            links.value = response.data.editoras.links;
        });
    };

    const onEdit = (id) => {
        router.push(`/editoras/${id}/edit`);
    };

    const deleteEditora = (id) => {
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
                axios.delete(`/editora/${id}`).then(() => {
                    Swal.fire({
                        title: "Deletado!",
                        text: "O registro foi deletado.",
                        icon: "success"
                    });
                    getEditoras();
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
        editoras,
        links,
        searchQuery,
        newEditoras,
        getEditoras,
        changePage,
        onEdit,
        deleteEditora,
        translateLabel
    };
}