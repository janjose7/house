<?php

$insertar = $conn->prepare("INSERT INTO recibo_scs4_oxerev (
                                                            codigo_scs4_rev,
                                                            tt0,
                                                            tt1,
                                                            tt2,
                                                            tt3,
                                                            tt4,
                                                            tt5,
                                                            tt6,
                                                            tt7,
                                                            tt8,
                                                            tt9,
                                                            tt10,
                                                            tt11,
                                                            tt12,
                                                            tt13,
                                                            tt14,
                                                            tt15,
                                                            tt16,
                                                            tt17,
                                                            tt18,
                                                            tt19,
                                                            tt0_nc,
                                                            tt1_nc,
                                                            tt2_nc,
                                                            tt3_nc,
                                                            tt4_nc,
                                                            tt5_nc,
                                                            tt6_nc,
                                                            tt7_nc,
                                                            tt8_nc,
                                                            tt9_nc,
                                                            x0,
                                                            x1,
                                                            x2,
                                                            x3,
                                                            x4,
                                                            x5,
                                                            x6,
                                                            x7,
                                                            x8,
                                                            x9,
                                                            x10,
                                                            x11,
                                                            x12,
                                                            x13,
                                                            x14,
                                                            x15,
                                                            x16,
                                                            x17,
                                                            x18,
                                                            x19,
                                                            x0_nc,
                                                            x1_nc,
                                                            x2_nc,
                                                            x3_nc,
                                                            x4_nc,
                                                            x5_nc,
                                                            x6_nc,
                                                            x7_nc,
                                                            x8_nc,
                                                            x9_nc,
                                                            x0_d,
                                                            x1_d,
                                                            x2_d,
                                                            x3_d,
                                                            x4_d,
                                                            x5_d,
                                                            x6_d,
                                                            x7_d,
                                                            x8_d,
                                                            x9_d,
                                                            x10_d,
                                                            x11_d,
                                                            x12_d,
                                                            x13_d,
                                                            x14_d,
                                                            x15_d,
                                                            x16_d,
                                                            x17_d,
                                                            x18_d,
                                                            x19_d,
                                                            ap0,
                                                            ap1,
                                                            ap2,
                                                            ap3,
                                                            ap4,
                                                            ap5,
                                                            ap6,
                                                            ap7,
                                                            ap8,
                                                            ap9,
                                                            ncCo,
                                                            subCo,
                                                            reservaCo,
                                                            prestacionCo,
                                                            softCo,
                                                            totalCo,
                                                            ncPro,
                                                            subPro,
                                                            reservaPro,
                                                            prestacionPro,
                                                            softPro,
                                                            totalPro,
                                                            totalPro_usd_scs4_rev,
                                                            ccomun_scs4_rev
                                                        ) VALUES (
                                                            :codigo,
                                                            :tt0,
                                                            :tt1,
                                                            :tt2,
                                                            :tt3,
                                                            :tt4,
                                                            :tt5,
                                                            :tt6,
                                                            :tt7,
                                                            :tt8,
                                                            :tt9,
                                                            :tt10,
                                                            :tt11,
                                                            :tt12,
                                                            :tt13,
                                                            :tt14,
                                                            :tt15,
                                                            :tt16,
                                                            :tt17,
                                                            :tt18,
                                                            :tt19,
                                                            :tt0_nc,
                                                            :tt1_nc,
                                                            :tt2_nc,
                                                            :tt3_nc,
                                                            :tt4_nc,
                                                            :tt5_nc,
                                                            :tt6_nc,
                                                            :tt7_nc,
                                                            :tt8_nc,
                                                            :tt9_nc,
                                                            :x0,
                                                            :x1,
                                                            :x2,
                                                            :x3,
                                                            :x4,
                                                            :x5,
                                                            :x6,
                                                            :x7,
                                                            :x8,
                                                            :x9,
                                                            :x10,
                                                            :x11,
                                                            :x12,
                                                            :x13,
                                                            :x14,
                                                            :x15,
                                                            :x16,
                                                            :x17,
                                                            :x18,
                                                            :x19,
                                                            :x0_nc,
                                                            :x1_nc,
                                                            :x2_nc,
                                                            :x3_nc,
                                                            :x4_nc,
                                                            :x5_nc,
                                                            :x6_nc,
                                                            :x7_nc,
                                                            :x8_nc,
                                                            :x9_nc,
                                                            :x0_d,
                                                            :x1_d,
                                                            :x2_d,
                                                            :x3_d,
                                                            :x4_d,
                                                            :x5_d,
                                                            :x6_d,
                                                            :x7_d,
                                                            :x8_d,
                                                            :x9_d,
                                                            :x10_d,
                                                            :x11_d,
                                                            :x12_d,
                                                            :x13_d,
                                                            :x14_d,
                                                            :x15_d,
                                                            :x16_d,
                                                            :x17_d,
                                                            :x18_d,
                                                            :x19_d,
                                                            :ap0,
                                                            :ap1,
                                                            :ap2,
                                                            :ap3,
                                                            :ap4,
                                                            :ap5,
                                                            :ap6,
                                                            :ap7,
                                                            :ap8,
                                                            :ap9,
                                                            :ncCo,
                                                            :subCo,
                                                            :reservaCo,
                                                            :prestacionCo,
                                                            :softCo,
                                                            :totalCo,
                                                            :ncPro,
                                                            :subPro,
                                                            :reservaPro,
                                                            :prestacionPro,
                                                            :softPro,
                                                            :totalPro,
                                                            :totalPro_usd_scs4_rev,
                                                            :ccomun_scs4_rev
                                                        )");

$insertar->execute(array(
                            ":codigo" => $crypto,
                            ":tt0" => ucwords($tt0),
                            ":tt1" => ucwords($tt1),
                            ":tt2" => ucwords($tt2),
                            ":tt3" => ucwords($tt3),
                            ":tt4" => ucwords($tt4),
                            ":tt5" => ucwords($tt5),
                            ":tt6" => ucwords($tt6),
                            ":tt7" => ucwords($tt7),
                            ":tt8" => ucwords($tt8),
                            ":tt9" => ucwords($tt9),
                            ":tt10" => ucwords($tt10),
                            ":tt11" => ucwords($tt11),
                            ":tt12" => ucwords($tt12),
                            ":tt13" => ucwords($tt13),
                            ":tt14" => ucwords($tt14),
                            ":tt15" => ucwords($tt15),
                            ":tt16" => ucwords($tt16),
                            ":tt17" => ucwords($tt17),
                            ":tt18" => ucwords($tt18),
                            ":tt19" => ucwords($tt19),
                            ":tt0_nc" => ucwords($tt0_nc),
                            ":tt1_nc" => ucwords($tt1_nc),
                            ":tt2_nc" => ucwords($tt2_nc),
                            ":tt3_nc" => ucwords($tt3_nc),
                            ":tt4_nc" => ucwords($tt4_nc),
                            ":tt5_nc" => ucwords($tt5_nc),
                            ":tt6_nc" => ucwords($tt6_nc),
                            ":tt7_nc" => ucwords($tt7_nc),
                            ":tt8_nc" => ucwords($tt8_nc),
                            ":tt9_nc" => ucwords($tt9_nc),
                            ":x0" => round($x0, 2),
                            ":x1" => round($x1, 2),
                            ":x2" => round($x2, 2),
                            ":x3" => round($x3, 2),
                            ":x4" => round($x4, 2),
                            ":x5" => round($x5, 2),
                            ":x6" => round($x6, 2),
                            ":x7" => round($x7, 2),
                            ":x8" => round($x8, 2),
                            ":x9" => round($x9, 2),
                            ":x10" => round($x10, 2),
                            ":x11" => round($x11, 2),
                            ":x12" => round($x12, 2),
                            ":x13" => round($x13, 2),
                            ":x14" => round($x14, 2),
                            ":x15" => round($x15, 2),
                            ":x16" => round($x16, 2),
                            ":x17" => round($x17, 2),
                            ":x18" => round($x18, 2),
                            ":x19" => round($x19, 2),
                            ":x0_nc" => round($x0_nc, 2),
                            ":x1_nc" => round($x1_nc, 2),
                            ":x2_nc" => round($x2_nc, 2),
                            ":x3_nc" => round($x3_nc, 2),
                            ":x4_nc" => round($x4_nc, 2),
                            ":x5_nc" => round($x5_nc, 2),
                            ":x6_nc" => round($x6_nc, 2),
                            ":x7_nc" => round($x7_nc, 2),
                            ":x8_nc" => round($x8_nc, 2),
                            ":x9_nc" => round($x9_nc, 2),
                            ":x0_d" => round($x0_d, 2),
                            ":x1_d" => round($x1_d, 2),
                            ":x2_d" => round($x2_d, 2),
                            ":x3_d" => round($x3_d, 2),
                            ":x4_d" => round($x4_d, 2),
                            ":x5_d" => round($x5_d, 2),
                            ":x6_d" => round($x6_d, 2),
                            ":x7_d" => round($x7_d, 2),
                            ":x8_d" => round($x8_d, 2),
                            ":x9_d" => round($x9_d, 2),
                            ":x10_d" => round($x10_d, 2),
                            ":x11_d" => round($x11_d, 2),
                            ":x12_d" => round($x12_d, 2),
                            ":x13_d" => round($x13_d, 2),
                            ":x14_d" => round($x14_d, 2),
                            ":x15_d" => round($x15_d, 2),
                            ":x16_d" => round($x16_d, 2),
                            ":x17_d" => round($x17_d, 2),
                            ":x18_d" => round($x18_d, 2),
                            ":x19_d" => round($x19_d, 2),
                            ":ap0" => round($ap0, 2),
                            ":ap1" => round($ap1, 2),
                            ":ap2" => round($ap2, 2),
                            ":ap3" => round($ap3, 2),
                            ":ap4" => round($ap4, 2),
                            ":ap5" => round($ap5, 2),
                            ":ap6" => round($ap6, 2),
                            ":ap7" => round($ap7, 2),
                            ":ap8" => round($ap8, 2),
                            ":ap9" => round($ap9, 2),
                            ":ncCo" => round($op_sum_nc, 2),
                            ":subCo" => round($op_sum, 2),
                            ":reservaCo" => round($op_res, 2),
                            ":prestacionCo" => round($op_fdp, 2),
                            ":softCo" => round($op_sof, 2),
                            ":totalCo" => round($op_total_nc, 2),
                            ":ncPro" => round($res_pro_co, 2),
                            ":subPro" => round($sum_pro, 2),
                            ":reservaPro" => round($res_pro, 2),
                            ":prestacionPro" => round($fdp_pro, 2),
                            ":softPro" => round($sof_pro, 2),
                            ":totalPro" => round($op_pro_co, 2),
                            ":totalPro_usd_scs4_rev" => round($ali_pro_co, 2),
                            ":ccomun_scs4_rev" => strtoupper($edif_nc)),
                        );
?>