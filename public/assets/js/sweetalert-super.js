document.querySelectorAll(".deleteUser").forEach((button) => {
    button.addEventListener("click", function (event) {
        event.preventDefault();
        const form = document.getElementById("deleteForm" + this.dataset.id);

        Swal.fire({
            title: "Menghapus Pengguna",
            text: `Apakah Anda Yakin Menghapus Pengguna?`,
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, Hapus!",
            cancelButtonText: "Batal",
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: "Deleted!",
                    text: "Your file has been deleted.",
                    icon: "success",
                });
                form.submit();
            }
        });
    });
});
