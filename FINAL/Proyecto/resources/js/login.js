const canvas = document.getElementById("background");
const ctx = canvas.getContext("2d");

function resizeCanvas() {
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;
}

resizeCanvas();

const particles = [];
const constellations = [];

const particleCount = 80;

class Particle {

    constructor() {

        this.x = Math.random() * canvas.width;
        this.y = Math.random() * canvas.height;

        this.vx = (Math.random() - 0.5) * 0.8;
        this.vy = (Math.random() - 0.5) * 0.8;

        this.size = 2;
    }

    update() {

        this.x += this.vx;
        this.y += this.vy;

        if (this.x < 0 || this.x > canvas.width) {
            this.vx *= -1;
        }

        if (this.y < 0 || this.y > canvas.height) {
            this.vy *= -1;
        }
    }

    draw() {

        ctx.beginPath();

        ctx.arc(
            this.x,
            this.y,
            this.size,
            0,
            Math.PI * 2
        );

        ctx.fillStyle = "#98D2EB";
        ctx.fill();
    }
}

for (let i = 0; i < particleCount; i++) {
    particles.push(new Particle());
}

function drawDumbbell(x, y, alpha) {

    ctx.save();

    ctx.globalAlpha = alpha;
    ctx.strokeStyle = "#98D2EB";
    ctx.lineWidth = 4;

    // Barra
    ctx.beginPath();
    ctx.moveTo(x - 50, y);
    ctx.lineTo(x + 50, y);
    ctx.stroke();

    // Discos izquierda
    ctx.strokeRect(x - 70, y - 20, 10, 40);
    ctx.strokeRect(x - 55, y - 15, 10, 30);

    // Discos derecha
    ctx.strokeRect(x + 60, y - 20, 10, 40);
    ctx.strokeRect(x + 45, y - 15, 10, 30);

    ctx.restore();
}

function spawnConstellation() {

    let x;
    let y;

    // Evitar el centro (login)
    do {

        x = Math.random() * canvas.width;
        y = Math.random() * canvas.height;

    } while (

        x > canvas.width / 2 - 250 &&
        x < canvas.width / 2 + 250 &&
        y > canvas.height / 2 - 200 &&
        y < canvas.height / 2 + 200

    );

    constellations.push({
        x,
        y,
        alpha: 1
    });
}

// Cada 4 a 8 segundos aparece una mancuerna
function scheduleConstellation() {

    spawnConstellation();

    const nextTime =
        4000 + Math.random() * 4000;

    setTimeout(
        scheduleConstellation,
        nextTime
    );
}

scheduleConstellation();

function drawConnections() {

    for (let i = 0; i < particles.length; i++) {

        for (let j = i + 1; j < particles.length; j++) {

            const dx =
                particles[i].x - particles[j].x;

            const dy =
                particles[i].y - particles[j].y;

            const dist =
                Math.sqrt(dx * dx + dy * dy);

            if (dist < 120) {

                ctx.beginPath();

                ctx.moveTo(
                    particles[i].x,
                    particles[i].y
                );

                ctx.lineTo(
                    particles[j].x,
                    particles[j].y
                );

                ctx.strokeStyle =
                    "rgba(152,210,235,0.15)";

                ctx.stroke();
            }
        }
    }
}

function animate() {

    ctx.clearRect(
        0,
        0,
        canvas.width,
        canvas.height
    );

    particles.forEach(p => {

        p.update();
        p.draw();

    });

    drawConnections();

    for (
        let i = constellations.length - 1;
        i >= 0;
        i--
    ) {

        const c = constellations[i];

        drawDumbbell(
            c.x,
            c.y,
            c.alpha
        );

        c.alpha -= 0.003;

        if (c.alpha <= 0) {

            constellations.splice(i, 1);

        }
    }

    requestAnimationFrame(
        animate
    );
}

animate();

window.addEventListener(
    "resize",
    resizeCanvas
);