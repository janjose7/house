    function mostrar(id) {
        if (id == "s0") {
            $("#s0").show();
            $("#btnSolicitar").hide();
            $("#parque1").hide();
            $("#parque2").hide();
            $("#parque3").hide();
            $("#solvencia2").hide();
            $("#solvencia3").hide();
            $("#solvencia4").hide();
            $("#residencia2").hide();
            $("#residencia3").hide();
            $("#residencia4").hide();
            $("#residencia5").hide();
            $("#residencia6").hide();
            $("#mudanza1").hide();
            $("#mudanza2").hide();
            $("#mudanza3").hide();
        }
        if (id == "parque") {
            $("#btnSolicitar").show();
            $("#parque1").show();
            $("#parque2").show();
            $("#parque3").show();
            $("#solvencia2").hide();
            $("#solvencia3").hide();
            $("#solvencia4").hide();
            $("#residencia2").hide();
            $("#residencia3").hide();
            $("#residencia4").hide();
            $("#residencia5").hide();
            $("#residencia6").hide();
            $("#mudanza1").hide();
            $("#mudanza2").hide();
            $("#mudanza3").hide();
        }
        if (id == "solvencia") {
            $("#btnSolicitar").show();
            $("#parque1").hide();
            $("#parque2").hide();
            $("#parque3").hide();
            $("#solvencia2").show();
            $("#solvencia3").show();
            $("#solvencia4").show();
            $("#residencia2").hide();
            $("#residencia3").hide();
            $("#residencia4").hide();
            $("#residencia5").hide();
            $("#residencia6").hide();
            $("#mudanza1").hide();
            $("#mudanza2").hide();
            $("#mudanza3").hide();
        }
        if (id == "residencia") {
            $("#btnSolicitar").show();
            $("#parque1").hide();
            $("#parque2").hide();
            $("#parque3").hide();
            $("#solvencia2").hide();
            $("#solvencia3").hide();
            $("#solvencia4").hide();
            $("#residencia2").show();
            $("#residencia3").show();
            $("#residencia4").show();
            $("#residencia5").show();
            $("#residencia6").show();
            $("#mudanza1").hide();
            $("#mudanza2").hide();
            $("#mudanza3").hide();
        }
        if (id == "mudanza") {
            $("#btnSolicitar").show();
            $("#parque1").hide();
            $("#parque2").hide();
            $("#parque3").hide();
            $("#solvencia2").hide();
            $("#solvencia3").hide();
            $("#solvencia4").hide();
            $("#residencia2").hide();
            $("#residencia3").hide();
            $("#residencia4").hide();
            $("#residencia5").hide();
            $("#residencia6").hide();
            $("#mudanza1").show();
            $("#mudanza2").show();
            $("#mudanza3").show();
        }
        if (id == "s00") {
            $("#btnSolicitar").hide();
            $("#viv_apto").hide();
            $("#pcl0").hide();
            $("#pcl1").hide();
            $("#pcl2").hide();
            $("#mlt0").hide();
            $("#mlt1").hide();
            $("#mlt2").hide();
        }
        if (id == "apto_pcl") {
            $("#btnSolicitar").show();
            $("#viv_apto").show();
            $("#pcl0").show();
            $("#pcl1").show();
            $("#pcl2").show();
            $("#mlt0").hide();
            $("#mlt1").hide();
            $("#mlt2").hide();
        }
        if (id == "multa") {
            $("#btnSolicitar").show();
            $("#viv_apto").show();
            $("#pcl0").hide();
            $("#pcl1").hide();
            $("#pcl2").hide();
            $("#mlt0").show();
            $("#mlt1").show();
            $("#mlt2").show();
        }
    }

function datos(id) {
    if (id == "tf") {
        $("#tf").show();
        $("#pm").hide();
    }
    if (id == "pm") {
        $("#tf").hide();
        $("#pm").show();
    }
}