panel.plugin("cookbook/block-factory", {
    blocks: {
      box: {
        computed: {
          textField() {
            return this.field("text");
          }
        },
        template: `
        <div :class="'k-block-type-box box-' + content.boxtype">
          <k-writer
            class="label"
            ref="textbox"
            :marks="textField.marks"
            :value="content.text"
            :placeholder="textField.placeholder || 'Enter some stuff…'"
            @input="update({ text: $event })"
          />
          <k-icon
            v-if="content.type !== 'neutral'"
            class="k-block-type-box-icon"
            :type="content.boxtype"
          /> 
        </div>
      `
    },
    texture: {
      computed: {
        textSize() {
          return this.field("text_size");
        },
        color() {
          return this.field("color");
        },
        background() {
          return this.field("background");
        }
      },
      template: 
      ` 
        <div :style="'color: ' + content.color + ';'" class="k-block-type-box">
          TEXTURE BLOCK
        </div>
      `
    },
    capolettera: {
      computed: {
        textField() {
          return this.field("text");
        },
        color() {
          return this.field("color");
        },
        background() {
          return this.field("background");
        }
      },
      template: 
      ` 
        <div :style="'color: ' + content.color + ';'" class="k-block-type-box">
          <k-writer
            class="label"
            ref="textbox"
            :marks="textField.marks"
            :value="content.text"
            :placeholder="textField.placeholder || 'Enter some stuff…'"
            @input="update({ text: $event })"
          />
        </div>
      `
    },
      accordion: {
          computed: {
            summaryField() {
              return this.field("summary");
            },
            detailsField() {
              return this.field("details");
            }
          },
          template: `
            <div @dblclick="open">
              <details>
                <summary>
                  <k-writer
                    ref="summary"
                    :inline="true"
                    marks="false"
                    :placeholder="summaryField.placeholder || 'Add a summary…'"
                    :value="content.summary"
                    @input="update({ summary: $event })"
                  />
                </summary>
                <k-writer
                    ref="details"
                    :inline="detailsField.inline || false"
                    :marks="detailsField.marks"
                    :value="content.details"
                    :placeholder="detailsField.placeholder || 'Add some details'"
                    @input="update({ details: $event })"
                  />
              </details>
            </div>
          `
        },
      slider:{
        data() {
          return {
            text: "No text value"
          };
        },
        computed: {
          pages() {
              return this.content.pages || {};
          },
        },
        template: `
        <div @dblclick="open">           
          <h2 class="k-block-type-card-heading">Slider</h2>
        </div>
      `
      },
      card: {
          data() {
            return {
              text: "No text value"
            };
          },
          computed: {
            cardType() {
              return this.content.cardtype;
            },
            heading() {
              return (this.cardType === 'manual') ? this.content.heading : this.page.text;
            },
            image() {
              if(this.cardType === 'manual') {
                return this.content.image[0] || {};
              } else {
                return this.page.image || {}
              }
            },
            pageId() {
              return this.page ? this.page.id : '';
            },
            page() {
                return this.content.page[0] || {};
            },
          },
          watch: {
            "cardType": {
              handler (value) {
                if(value === 'page' && this.pageId) {
                this.$api.get('pages/' + this.pageId.replaceAll('/', '+')).then(page => {
                  this.text = page.content.seo_text.replace(/(<([^>]+)>)/gi, "") || this.text;
                });
                } else if(value === 'manual') {
                  this.text = this.content.text || this.text;
                }
    
              },
              immediate: true
            },
            "page": {
              handler (value) {
                if(this.cardType === 'page' && this.pageId) {
                this.$api.get('pages/' + this.pageId.replaceAll('/', '+')).then(page => {
                  this.text = page.content.seo_text.replace(/(<([^>]+)>)/gi, "") || this.text;
                });
                } else if(value === 'manual') {
                  this.text = this.content.text || this.text;
                }
              },
              immediate: true
            }
          },
          template: `
            <div @dblclick="open">
              <k-aspect-ratio
                class="k-block-type-card-image"
                cover="true"
                ratio="1/1"
              >
                <img
                  v-if="image.url"
                  :src="image.url"
                  alt=""
                >
              </k-aspect-ratio>
              <h2 class="k-block-type-card-heading">{{ heading }}</h2>
              <div class="k-block-type-card-text">{{ text }}</div>
            </div>
          `
      },      
      testimonial: {
          computed: {
          image() {
              return this.content.image[0] || {};
          },
          bio() {
              return [this.content.jobposition, this.content.company].filter(el => {
              return el != null && el != '';
              }).join(', ');
          },
          quoteField() {
              return this.field("quote");
          }
          },
          template: `
          <blockquote class="k-block-type-testimonial-quote" @dblclick="open">
              <k-writer
              ref="quote"
              :inline="true"
              :marks="false"
              :value="content.quote"
              :placeholder="quoteField.placeholder"
              @input="update({ quote: $event })"
              />
              <footer>
              <figure class="k-block-type-testimonial-voice">
                  <img
                  v-if="image.url"
                  :src="image.url"
                  width="48px"
                  height="48px"
                  :alt="'Photo of ' + content.name"
                  >
                  <figcaption>
                  {{content.name }}<br>
                  {{ bio }}
                  </figcaption>
              </figure>
              </footer>
          </blockquote>
          `
      },
      faq: {
          computed: {
            items() {
              return this.content.faq || {};
            },
            headingField() {
              return this.field("heading") || '';
            }
          },
          methods: {
            updateItem(content, index, name, value) {
              content.faq[index].content[name]= value;
              this.$emit("update", {
                  ...this.content,
                  ...content
                });
            }
          },
          template: `
            <div @dblclick="open">
              <h2 class="k-block-type-faq-heading">
                <k-writer
                  ref="heading"
                  :inline="headingField.inline"
                  :marks="headingField.marks"
                  :placeholder="headingField.placeholder || 'Add a heading'"
                  :value="content.heading"
                  @input="update({ heading: $event })"
                />
              </h2>
              <div v-if="content.faq.length">
                <details
                  class="k-block-type-faq-item"
                  v-for="(item, index) in items"
                  :key="index"
                >
                <summary>
                  <k-writer
                    ref="summary"
                    :inline="true"
                    :marks="false"
                    :value="item.content.summary"
                    @input="updateItem(content, index, 'summary', $event)"
                  />
                </summary>
                <div>
                  <k-writer
                    ref="details"
                    :marks="true"
                    :value="item.content.details"
                    @input="updateItem(content, index, 'details', $event)"
                />
                </div>
                </details>
              </div>
              <div v-else>No items yet</div>
            </div>
          `
      },
    }
});