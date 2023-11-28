BEGIN

DECLARE totalUsuarios INT;
DECLARE totalProveedores INT;
DECLARE totalProductos INT;
DECLARE totalCategorias INT;
DECLARE totalPedidos INT;

SET totalUsuarios = (SELECT COUNT(*) FROM usuarios);
SET totalProveedores = (SELECT COUNT(*) FROM proveedores);
SET totalProductos = (SELECT COUNT(*) FROM productos);
SET totalCategorias = (SELECT COUNT(*) FROM categorias);
SET totalPedidos = (SELECT COUNT(*) FROM pedidos);

SELECT totalUsuarios AS totalUsuarios, 
	   totalProveedores AS totalProveedores,
       totalProductos AS totalProductos,
       totalCategorias AS totalCategorias,
       totalPedidos AS totalPedidos,

END