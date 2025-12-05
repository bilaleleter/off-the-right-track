// --- BASIC SETUP ---
const scene = new THREE.Scene();
scene.background = new THREE.Color(0xffffff);
const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
const renderer = new THREE.WebGLRenderer({ antialias: true });
renderer.setSize(window.innerWidth, window.innerHeight);
document.getElementById('3d-container').appendChild(renderer.domElement);

// --- LIGHTING ---
const ambientLight = new THREE.AmbientLight(0xffffff, 0.6);
scene.add(ambientLight);
const directionalLight = new THREE.DirectionalLight(0xffffff, 0.8);
directionalLight.position.set(5, 5, 5);
scene.add(directionalLight);

// --- ORBIT CONTROLS ---
const controls = new THREE.OrbitControls(camera, renderer.domElement);
controls.enableDamping = true;
controls.dampingFactor = 0.05;

// --- MOUSE INTERACTION SETUP ---
const raycaster = new THREE.Raycaster();
const mouse = new THREE.Vector2();
let hoveredObject;
const originalMaterials = {};
const infoPanel = document.getElementById('info-panel');

// --- INFORMATION FOR CLICKABLE PARTS ---
// TODO: Update keys to match actual mesh names; includes a default 'Linux' entry
const componentInfo = {
    'Linux_Logo': {
        name: 'Linux : Le Cœur du NIRD',
        description: 'Linux est un système d\'exploitation libre et gratuit. Il est la base d\'un numérique éthique, durable et autonome, sans dépendance aux géants de la tech.'
    },
    'Linux': {
        name: 'Linux : Le Cœur du NIRD',
        description: 'Linux est un système d\'exploitation libre et gratuit. Il est la base d\'un numérique éthique, durable et autonome, sans dépendance aux géants de la tech.'
    }
};

// --- LOAD THE 3D MODEL ---
const loader = new THREE.GLTFLoader();
let logoModel; // Use a different variable name

loader.load(
    'tux.glb', // The name of your file
    function (gltf) {
        logoModel = gltf.scene;
        scene.add(logoModel);

        // Store original materials for hover effect
        logoModel.traverse((child) => {
            if (child.isMesh) {
                originalMaterials[child.uuid] = child.material.clone();
            }
        });

        // Center the camera on the loaded model
        const box = new THREE.Box3().setFromObject(logoModel);
        const center = box.getCenter(new THREE.Vector3());
        const size = box.getSize(new THREE.Vector3());
        const maxDim = Math.max(size.x, size.y, size.z);
        const fov = camera.fov * (Math.PI / 180);
        let cameraZ = Math.abs(maxDim / 2 / Math.tan(fov / 2));
        camera.position.set(center.x, center.y, center.z + cameraZ * 1.5);
        controls.target.set(center.x, center.y, center.z);
        controls.update();
    },
    undefined,
    function (error) {
        console.error('An error happened', error);
    }
);

// --- MOUSE EVENT FUNCTIONS ---
function onMouseMove(event) {
    if (!logoModel) return;

    mouse.x = (event.clientX / window.innerWidth) * 2 - 1;
    mouse.y = - (event.clientY / window.innerHeight) * 2 + 1;

    raycaster.setFromCamera(mouse, camera);
    const intersects = raycaster.intersectObjects(logoModel.children, true);

    // Reset previous hover
    if (hoveredObject) {
        hoveredObject.material = originalMaterials[hoveredObject.uuid];
        hoveredObject = null;
        document.body.style.cursor = 'auto';
    }

    if (intersects.length > 0) {
        const object = intersects[0].object;

        // Determine info from mapping (fallback to 'Linux')
        const info = componentInfo[object.name] || componentInfo['Linux'];

        if (info) {
            hoveredObject = object;
            hoveredObject.material = hoveredObject.material.clone();
            hoveredObject.material.emissive = new THREE.Color(0xFCC624); // Linux yellow glow
            hoveredObject.material.emissiveIntensity = 0.3;
            document.body.style.cursor = 'pointer';

            // Populate and show info panel near cursor
            document.getElementById('component-name').innerText = info.name;
            document.getElementById('component-description').innerText = info.description;
            infoPanel.style.left = (event.clientX + 40) + 'px';
            infoPanel.style.top = (event.clientY + 12) + 'px';
            infoPanel.classList.remove('hidden');
        } else {
            infoPanel.classList.add('hidden');
        }
    } else {
        infoPanel.classList.add('hidden');
    }
}

function onMouseClick() {
    if (hoveredObject) {
        const info = componentInfo[hoveredObject.name];
        if (info) {
            document.getElementById('component-name').innerText = info.name;
            document.getElementById('component-description').innerText = info.description;
        }
    }
}

window.addEventListener('mousemove', onMouseMove);
window.addEventListener('click', onMouseClick);

// --- ANIMATION LOOP ---
function animate() {
    requestAnimationFrame(animate);
    controls.update();
    renderer.render(scene, camera);
}

animate();

// --- HANDLE WINDOW RESIZING ---
window.addEventListener('resize', () => {
    const container = document.getElementById('3d-container');
    camera.aspect = container.clientWidth / container.clientHeight;
    camera.updateProjectionMatrix();
    renderer.setSize(container.clientWidth, container.clientHeight);
});