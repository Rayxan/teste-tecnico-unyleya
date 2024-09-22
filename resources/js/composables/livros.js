import { ref, onMounted, watch } from "vue";
import { useRouter } from "vue-router";
import axios from "axios";
import Swal from "sweetalert2";

export function useLivros() {
    const router = useRouter();

    const livros = ref([]);
    const links = ref([]);
    const searchQuery = ref('');

    onMounted(async () => {
        getLivros();
    });

    watch(searchQuery, () => {
        getLivros();
    });

    const newLivros = () => {
        router.push('livros/create');
    };

    const getLivros = async () => {
        let response = await axios.get(`/livros?&searchQuery=${searchQuery.value}`);
        livros.value = response.data.livros.data;
        links.value = response.data.livros.links;
    };

    const changePage = (link) => {
        if (!link.url || link.active) {
            return;
        }
        axios.get(link.url).then((response) => {
            livros.value = response.data.livros.data;
            links.value = response.data.livros.links;
        });
    };

    const onEdit = (id) => {
        router.push(`/livros/${id}/edit`);
    };

    const deleteLivro = (id) => {
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
                axios.delete(`/livro/${id}`).then(() => {
                    Swal.fire({
                        title: "Deletado!",
                        text: "O registro foi deletado.",
                        icon: "success"
                    });
                    getLivros();
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
        livros,
        links,
        searchQuery,
        newLivros,
        getLivros,
        changePage,
        onEdit,
        deleteLivro,
        translateLabel
    };
}