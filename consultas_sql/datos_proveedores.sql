BEGIN

SELECT '' as detalles,
			prov.id_proveedor,
			prov.nombre_proveedor,
            prov.status_proveedor,
        '' as opciones,

FROM proveedores prov;

END