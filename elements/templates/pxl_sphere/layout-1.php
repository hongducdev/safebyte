<?php
$settings = $widget->get_settings_for_display();

// Kiểm tra và gán giá trị mặc định cho các settings
$sphere_size = isset($settings['sphere_size']['size']) ? $settings['sphere_size']['size'] : 400;
$sphere_radius = $sphere_size * 0.3;
$sphere_color = isset($settings['sphere_color']) ? $settings['sphere_color'] : '#ff0000';
$rotation_type = isset($settings['rotation_type']) ? $settings['rotation_type'] : 'y_axis';
$rotation_speed = isset($settings['rotation_speed']['size']) ? $settings['rotation_speed']['size'] : 0.005;
$custom_x_speed = isset($settings['custom_x_speed']['size']) ? $settings['custom_x_speed']['size'] : 0.003;
$custom_y_speed = isset($settings['custom_y_speed']['size']) ? $settings['custom_y_speed']['size'] : 0.005;
$tilt_angle = isset($settings['tilt_angle']['size']) ? $settings['tilt_angle']['size'] : -30;
?>

<div class="pxl-sphere">
    <canvas id="sphereCanvas"></canvas>
</div>

<script>
    (function() {
        const canvas = document.getElementById("sphereCanvas");
        const ctx = canvas.getContext("2d");
        const size = <?php echo esc_js($sphere_size); ?>;
        canvas.width = size;
        canvas.height = size;

        let angleX = (<?php echo esc_js($tilt_angle); ?> * Math.PI) / 180;
        let angleY = 0;
        const radius = <?php echo esc_js($sphere_radius); ?>;
        const sphereColor = "<?php echo esc_js($sphere_color); ?>";
        const rotationType = "<?php echo esc_js($rotation_type); ?>";
        const rotationSpeed = <?php echo esc_js($rotation_speed); ?>;
        const customXSpeed = <?php echo esc_js($custom_x_speed); ?>;
        const customYSpeed = <?php echo esc_js($custom_y_speed); ?>;
        const points = [];

        for (let lat = -Math.PI / 2; lat <= Math.PI / 2; lat += Math.PI / 10) {
            for (let lon = 0; lon < 2 * Math.PI; lon += Math.PI / 10) {
                let x = Math.cos(lat) * Math.cos(lon);
                let y = Math.sin(lat);
                let z = Math.cos(lat) * Math.sin(lon);
                points.push({ x, y, z });
            }
        }

        function rotate(point, angleX, angleY) {
            let cosX = Math.cos(angleX), sinX = Math.sin(angleX);
            let cosY = Math.cos(angleY), sinY = Math.sin(angleY);

            let y = point.y * cosX - point.z * sinX;
            let z = point.y * sinX + point.z * cosX;
            let x = point.x * cosY - z * sinY;
            z = point.x * sinY + z * cosY;
            return { x, y, z };
        }

        function drawSphere() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            ctx.strokeStyle = sphereColor;
            ctx.lineWidth = 1;
            const cx = canvas.width / 2;
            const cy = canvas.height / 2;

            for (let lat = -Math.PI / 2; lat <= Math.PI / 2; lat += Math.PI / 10) {
                let circlePoints = [];
                for (let lon = 0; lon < 2 * Math.PI; lon += Math.PI / 20) {
                    let x = Math.cos(lat) * Math.cos(lon);
                    let y = Math.sin(lat);
                    let z = Math.cos(lat) * Math.sin(lon);
                    let rotatedPoint = rotate({ x, y, z }, angleX, angleY);
                    circlePoints.push(rotatedPoint);
                }
                ctx.beginPath();
                for (let i = 0; i < circlePoints.length; i++) {
                    let p = circlePoints[i];
                    if (i === 0) {
                        ctx.moveTo(cx + p.x * radius, cy + p.y * radius);
                    } else {
                        ctx.lineTo(cx + p.x * radius, cy + p.y * radius);
                    }
                }
                ctx.closePath();
                ctx.stroke();
            }

            for (let lon = 0; lon < 2 * Math.PI; lon += Math.PI / 10) {
                let circlePoints = [];
                for (let lat = -Math.PI / 2; lat <= Math.PI / 2; lat += Math.PI / 20) {
                    let x = Math.cos(lat) * Math.cos(lon);
                    let y = Math.sin(lat);
                    let z = Math.cos(lat) * Math.sin(lon);
                    let rotatedPoint = rotate({ x, y, z }, angleX, angleY);
                    circlePoints.push(rotatedPoint);
                }
                ctx.beginPath();
                for (let i = 0; i < circlePoints.length; i++) {
                    let p = circlePoints[i];
                    if (i === 0) {
                        ctx.moveTo(cx + p.x * radius, cy + p.y * radius);
                    } else {
                        ctx.lineTo(cx + p.x * radius, cy + p.y * radius);
                    }
                }
                ctx.stroke();
            }
        }

        function updateRotation() {
            switch(rotationType) {
                case 'y_axis':
                    angleY += rotationSpeed;
                    break;
                case 'x_axis':
                    angleX += rotationSpeed;
                    break;
                case 'both_axis':
                    angleX += rotationSpeed;
                    angleY += rotationSpeed;
                    break;
                case 'custom':
                    angleX += customXSpeed;
                    angleY += customYSpeed;
                    break;
                case 'none':
                    // No rotation
                    break;
            }
        }

        function animate() {
            updateRotation();
            drawSphere();
            requestAnimationFrame(animate);
        }

        animate();
    })();
</script>

<style>
.pxl-sphere {
    width: <?php echo esc_attr($sphere_size); ?>px;
    height: <?php echo esc_attr($sphere_size); ?>px;
    display: flex;
    justify-content: center;
    align-items: center;
    background: transparent;
}

#sphereCanvas {
    display: block;
}
</style>