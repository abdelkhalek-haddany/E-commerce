<template>
    <vue-countdown-timer
      @start_callback="startCallBack('Offer started')"
      @end_callback="endCallBack('Offer expired')"
      :start-time="'2020-01-01 00:00:00'"
      :end-time="endsat"
      :interval="1000"
      :start-label="'Until start'"
      label-position="begin"
      :end-text="'Offer expired!'"
      :day-txt="'days'"
      :hour-txt="'hours'"
      :minutes-txt="'minutes'"
      :seconds-txt="'seconds'">
      <template slot="start-label" slot-scope="scope">
        <span style="color: red" v-if="scope.props.startLabel !== '' && scope.props.tips && scope.props.labelPosition === 'begin'">{{scope.props.startLabel}}:</span>
        <span style="color: blue" v-if="scope.props.endLabel !== '' && !scope.props.tips && scope.props.labelPosition === 'begin'">{{scope.props.endLabel}}:</span>
      </template>
      <template slot="countdown" slot-scope="scope">
        <div class="countdown">
        <div class="item-time">
          <span class="name-time">{{scope.props.dayTxt}}</span>
          <span class="data-time">{{scope.props.days}}</span>
        </div>

        <div class="item-time">
          <span class="name-time">{{scope.props.hourTxt}}</span>
          <span class="data-time">{{scope.props.hours}}</span>
        </div>

        <div class="item-time">
          <span class="name-time">{{scope.props.minutesTxt}}</span>
          <span class="data-time">{{scope.props.minutes}}</span>
        </div>

         <div class="item-time">
          <span class="name-time">{{scope.props.secondsTxt}}</span>
          <span class="data-time">{{scope.props.seconds}}</span>
        </div>
        </div>
      </template>
 
      <template slot="end-label" slot-scope="scope">
        <span style="color: red" v-if="scope.props.startLabel !== '' && scope.props.tips && scope.props.labelPosition === 'end'">{{scope.props.startLabel}}:</span>
        <span style="color: blue" v-if="scope.props.endLabel !== '' && !scope.props.tips && scope.props.labelPosition === 'end'">{{scope.props.endLabel}}:</span>
      </template>

      <template slot="end-text" slot-scope="scope">
        <span style="color: green">{{ scope.props.endText}}</span>
      </template>
    </vue-countdown-timer>
</template>

<script>
export default {
  name: 'Timer',
  props:['startsat' , 'endsat'],
  methods: {
    startCallBack: function(x) {
      console.log(x);
    },
    endCallBack: function(x) {
      console.log(x);
    },
  },
};
</script>