export class BaseItem {
  constructor(image, title, value) {
    this.image = image;
    this.title = title;
    this.value = value;
  }

  render() {
    return `
      <li><a>
        <div class="itemHot__imgWrap">
            <img src="${this.image}" alt="">
        </div>
        <div class="itemHot__content">
            <h3 class="itemHot__title">
                ${this.title}
            </h3>
            <p class="itemHot__value">
                ${this.value}
            </p>
        </div>
      </a></li>
    `;
  }
}