function select() {
    return {

        open: false,

        closeListbox: function() {
            this.open = false;

        },

        toggleListboxVisibility: function() {
            if (this.open) return this.closeListbox();
            this.open = true;

        }
    }

};