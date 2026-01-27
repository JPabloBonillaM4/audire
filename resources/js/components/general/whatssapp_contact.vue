<script setup>
const phoneNumber = '5578980149';
const whatsappUrl = `https://wa.me/52${phoneNumber}?text=Hola,%20me%20gustaría%20obtener%20más%20información`;

const openWhatsApp = () => {
    window.open(whatsappUrl, '_blank');
};
</script>

<template>
    <div class="whatsapp-container">
        <div class="whatsapp-content">
            <a
                :href="whatsappUrl"
                target="_blank"
                class="whatsapp-button"
            >
                <div class="icon-wrapper">
                    <img src="/img/custom/iconwhatsapp_lg.png" alt="WhatsApp" class="whatsapp-icon">
                </div>
                <span class="whatsapp-text">Contáctanos</span>
            </a>
        </div>
    </div>
</template>

<style scoped>
.whatsapp-content {
    display: flex;
    align-items: center;
    width: 100%;
    justify-content: flex-end;
}

.whatsapp-container {
    position: fixed;
    bottom: 30px;
    right: 30px;
    z-index: 9999;
    transition: width 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
}

.whatsapp-button {
    display: flex;
    align-items: center;
    justify-content: flex-end;
    background: linear-gradient(135deg, #25d366 0%, #128c7e 100%);
    border-radius: 50px;
    box-shadow: 0 4px 15px rgba(37, 211, 102, 0.4);
    cursor: pointer;
    text-decoration: none;
    overflow: hidden;
    width: 60px;
    height: 60px;
    transition: all 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
    position: relative;
}

.whatsapp-container:hover {
    width: 200px;
}

.whatsapp-container:hover .whatsapp-button {
    width: 200px;
    padding-right: 20px;
    box-shadow: 0 6px 25px rgba(37, 211, 102, 0.6);
    transform: translateY(-2px);
}

.whatsapp-container:hover .whatsapp-text {
    opacity: 1;
    transform: translateX(0);
    transition: all 0.5s cubic-bezier(0.68, -0.55, 0.265, 1.55) 0.1s;
}

.whatsapp-text {
    transition: all 0.35s cubic-bezier(0.25, 0.46, 0.45, 0.94);
}

.icon-wrapper {
    display: flex;
    align-items: center;
    justify-content: center;
    min-width: 60px;
    height: 60px;
    position: absolute;
    right: 0;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 50%;
    transition: all 0.3s ease;
}

.whatsapp-icon {
    width: 35px;
    height: 35px;
    transition: transform 0.3s cubic-bezier(0.68, -0.55, 0.265, 1.55);
}

.whatsapp-button:hover .whatsapp-icon {
    transform: scale(1.1) rotate(5deg);
}

.whatsapp-button .whatsapp-icon {
    transition: transform 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
}

.whatsapp-text {
    color: white;
    font-weight: 600;
    font-size: 15px;
    opacity: 0;
    white-space: nowrap;
    transform: translateX(20px);
    transition: all 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
    margin-right: 70px;
}

.whatsapp-button.expanded .whatsapp-text {
    opacity: 1;
    transform: translateX(0);
}

/* Animación de pulso sutil */
@keyframes pulse {
    0% {
        box-shadow: 0 4px 15px rgba(37, 211, 102, 0.4);
    }
    50% {
        box-shadow: 0 4px 25px rgba(37, 211, 102, 0.6);
    }
    100% {
        box-shadow: 0 4px 15px rgba(37, 211, 102, 0.4);
    }
}

.whatsapp-button {
    animation: pulse 2s infinite;
}

.whatsapp-button:hover {
    animation: none;
}

/* Responsive */
@media (max-width: 768px) {
    .whatsapp-container {
        bottom: 20px;
        right: 20px;
    }

    .whatsapp-button {
        width: 55px;
        height: 55px;
    }

    .icon-wrapper {
        min-width: 55px;
        height: 55px;
    }

    .whatsapp-icon {
        width: 30px;
        height: 30px;
    }

    .whatsapp-button.expanded {
        width: 180px;
    }

    .whatsapp-text {
        font-size: 14px;
        margin-right: 65px;
    }
}
</style>