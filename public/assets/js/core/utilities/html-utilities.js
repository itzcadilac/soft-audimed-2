class HtmlUtilities {
    /**
     * Permite actualizar el Hash de HTML.
     * @param {html} element elemento html donde se actualizara el hash
     * @param {String} hash 
     */
    static updateHtmlHash(element, hash) {
        element.attr('content', hash);
    }
}

export {HtmlUtilities};