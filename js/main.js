camera.position.set(CAM_START.x, CAM_START.y, CAM_START.z);

renderer.setSize(WIDTH, HEIGHT);
renderer.setClearColor(0xfefefe, 1);
renderer.autoClear = true;

scene.add(ambientLight);

//Functions


// ----  TERRAIN  ----
var terrainLoader = new THREE.TerrainLoader();

var terrainGeometry = new THREE.PlaneGeometry(MAPx, MAPy, DEMx-1, DEMy-1);
terrainGeometry.computeFaceNormals();
terrainGeometry.computeVertexNormals();
	
var terrainMaterial = new THREE.MeshPhongMaterial(
	{
	map: THREE.ImageUtils.loadTexture('resources/relief.png')
	});
var terrain;
var heightMap = [];

terrainLoader.load('resources/dem.bin', function(data) {
	for (var i = 0, l = terrainGeometry.vertices.length; i < l; i++) {
		terrainGeometry.vertices[i].z = data[i]/65535*1215;
		heightMap[i] = data[i];
	}

	terrain = new THREE.Mesh(terrainGeometry, terrainMaterial);
	scene.add(terrain);
});

var terrainMap = terrainGeometry.vertices;

// ----  COORDINATES  ----

var maxHeight = Math.max.apply(Math, heightMap);
var minHeight = Math.min.apply(Math, heightMap);

// --- MORE SETUP ---

loadData();


// ----  RENDER  ----
function render() {   
	requestAnimationFrame(render);
	controls.update();
	renderer.setViewport(0, 0, WIDTH, HEIGHT);	
	renderer.render(scene, camera);
};


