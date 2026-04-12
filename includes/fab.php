<?php
/**
 * FAB Include
 * Floating Action Button untuk WhatsApp
 */
?>
<a href="https://wa.me/62812345678" target="_blank" class="fab-whatsapp" title="Chat WhatsApp">
    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="white">
        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.67-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.076 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421-7.403h-.004c-1.537 0-2.852-.504-3.986-1.495C5.71 4.962 5.128 3.628 5.128 2.129c0-3.289 2.692-5.965 6.004-5.965 1.466 0 2.845.363 4.012 1.053 1.166.69 2.042 1.656 2.632 2.897.59 1.24.887 2.605.887 4.072 0 3.289-2.692 5.965-6.004 5.965m8.339-11.312C18.554.405 16.309-.386 13.813-.386 7.994-.386 3.25 3.916 3.25 9.129c0 1.774.433 3.44 1.299 4.91l-1.381 5.151 5.276-1.382c1.396.911 3.137 1.443 5.03 1.443 5.82 0 10.565-4.301 10.565-9.514 0-2.541-.94-4.914-2.649-6.75"/>
    </svg>
</a>

<style>
.fab-whatsapp {
    position: fixed;
    bottom: 30px;
    right: 30px;
    width: 60px;
    height: 60px;
    background: linear-gradient(135deg, #25D366, #20BA5E);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 8px 24px rgba(37, 211, 102, 0.4),
                0 0 20px rgba(37, 211, 102, 0.2);
    z-index: 999;
    transition: all 0.3s ease;
    text-decoration: none;
    border: none;
    cursor: pointer;
}

.fab-whatsapp:hover {
    transform: translateY(-5px) scale(1.08);
    box-shadow: 0 12px 32px rgba(37, 211, 102, 0.5),
                0 0 30px rgba(37, 211, 102, 0.3);
}

.fab-whatsapp svg {
    width: 32px;
    height: 32px;
    filter: drop-shadow(0 2px 4px rgba(0,0,0,0.2));
}

@media (max-width: 768px) {
    .fab-whatsapp {
        bottom: 20px;
        right: 20px;
        width: 52px;
        height: 52px;
    }
    
    .fab-whatsapp svg {
        width: 28px;
        height: 28px;
    }
}
</style>
