(function ($) {
    "use strict";

    var pxl_widget_sphere_handler = function ($scope, $) {
        const canvas = $scope.find(".pxl-sphere canvas");
        if (!canvas.length) return;

        const sphereEl = $scope.find(".pxl-sphere");
        const size = parseInt(sphereEl.data("size")) || 400;
        const radius = parseInt(sphereEl.data("radius")) || size * 0.3;
        const sphereColor = sphereEl.data("color") || "#fff";
        const rotationType = sphereEl.data("rotation") || "y_axis";
        const rotationSpeed = parseFloat(sphereEl.data("speed")) || 0.005;
        const customXSpeed = parseFloat(sphereEl.data("xspeed")) || 0.003;
        const customYSpeed = parseFloat(sphereEl.data("yspeed")) || 0.005;
        const tiltAngle =
            ((parseFloat(sphereEl.data("tilt")) || -30) * Math.PI) / 180;

        const ctx = canvas[0].getContext("2d");

        canvas[0].width = size;
        canvas[0].height = size;

        let angleX = tiltAngle;
        let angleY = 0;

        function rotate(point, angleX, angleY) {
            let cosX = Math.cos(angleX),
                sinX = Math.sin(angleX);
            let cosY = Math.cos(angleY),
                sinY = Math.sin(angleY);

            let y = point.y * cosX - point.z * sinX;
            let z = point.y * sinX + point.z * cosX;
            let x = point.x * cosY - z * sinY;
            z = point.x * sinY + z * cosY;
            return { x, y, z };
        }

        function drawSphere() {
            ctx.clearRect(0, 0, canvas[0].width, canvas[0].height);
            ctx.strokeStyle = sphereColor;
            ctx.lineWidth = 1;
            const cx = canvas[0].width / 2;
            const cy = canvas[0].height / 2;

            for (
                let lat = -Math.PI / 2;
                lat <= Math.PI / 2;
                lat += Math.PI / 10
            ) {
                let circlePoints = [];
                for (let lon = 0; lon < 2 * Math.PI; lon += Math.PI / 20) {
                    let x = Math.cos(lat) * Math.cos(lon);
                    let y = Math.sin(lat);
                    let z = Math.cos(lat) * Math.sin(lon);
                    let rotatedPoint = rotate({ x, y, z }, angleX, angleY);
                    circlePoints.push(rotatedPoint);
                }
                ctx.beginPath();
                circlePoints.forEach((p, i) => {
                    if (i === 0) {
                        ctx.moveTo(cx + p.x * radius, cy + p.y * radius);
                    } else {
                        ctx.lineTo(cx + p.x * radius, cy + p.y * radius);
                    }
                });
                ctx.closePath();
                ctx.stroke();
            }

            for (let lon = 0; lon < 2 * Math.PI; lon += Math.PI / 10) {
                let circlePoints = [];
                for (
                    let lat = -Math.PI / 2;
                    lat <= Math.PI / 2;
                    lat += Math.PI / 20
                ) {
                    let x = Math.cos(lat) * Math.cos(lon);
                    let y = Math.sin(lat);
                    let z = Math.cos(lat) * Math.sin(lon);
                    let rotatedPoint = rotate({ x, y, z }, angleX, angleY);
                    circlePoints.push(rotatedPoint);
                }
                ctx.beginPath();
                circlePoints.forEach((p, i) => {
                    if (i === 0) {
                        ctx.moveTo(cx + p.x * radius, cy + p.y * radius);
                    } else {
                        ctx.lineTo(cx + p.x * radius, cy + p.y * radius);
                    }
                });
                ctx.stroke();
            }
        }

        function updateRotation() {
            switch (rotationType) {
                case "y_axis":
                    angleY += rotationSpeed;
                    break;
                case "x_axis":
                    angleX += rotationSpeed;
                    break;
                case "both_axis":
                    angleX += rotationSpeed;
                    angleY += rotationSpeed;
                    break;
                case "custom":
                    angleX += customXSpeed;
                    angleY += customYSpeed;
                    break;
            }
        }

        function animate() {
            updateRotation();
            drawSphere();
            requestAnimationFrame(animate);
        }

        animate();
    };

    $(window).on("elementor/frontend/init", function () {
        elementorFrontend.hooks.addAction(
            "frontend/element_ready/pxl_sphere.default",
            pxl_widget_sphere_handler
        );
    });
})(jQuery);
