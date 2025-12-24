export default (route) => {
  return {
    replyTo:'',
    reply:'',
    commentId:'',
    error:'',
    success:'',
    loading:false,
    init(){
      $refs.dialog.addEventListener('close', () => {
        this.reset();
      })
    },
    async sendReply(){
      this.loading = true;
      const csrf_token = document.querySelector(`meta[name='csrf-token']`).content;
      const response = await fetch(route,{
        method:'POST',
        headers:{
          'Content-Type':'application/json',
          'X-CSRF-TOKEN': csrf_token,
          'Accept': 'application/json'
        },
        body: JSON.stringify({
          reply: this.reply,
          commentId: this.commentId
        })
      })

      const data = await response.json();

      if(!response.ok){
        this.loading = false;
        if(response.status === 422){
          this.error = data.errors?.reply?.[0] ?? 'Erro inesperado';
          return;
        }

        this.error = data.message ?? 'Erro inesperado';
        return;
      }

      this.success = data;
      this.error = '';

      setTimeout(() => {
        window.location.reload();
      }, 2000);
    },
    reset(){
      this.reply = '';
      this.error = '';
      this.success = '';
    },
    modalReply(event){
      this.replyTo = event.detail.replyTo;
      this.commentId = event.detail.commentId;
      setTimeout(() => {
        $refs.textarea.focus();
      }, 200)
    }
  }
}