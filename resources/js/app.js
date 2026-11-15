import { applyLiquidGlass } from './liquid-glass/index.js';
import './liquid-glass/liquid-glass.css';

/**
 * Apply the liquid glass effect to every element marked with [data-liquid-glass].
 * The attribute value sets the intensity: subtle | normal | strong.
 */
document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('[data-liquid-glass]').forEach((element) => {
        applyLiquidGlass(element, { intensity: element.dataset.liquidGlass || 'normal' });
    });
});
